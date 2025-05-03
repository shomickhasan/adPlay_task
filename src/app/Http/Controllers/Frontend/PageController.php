<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{




    public function productDetails($slug) {
        $product = Product::with('productQuantitys','productGalleries','productColors')
            ->where('slug', $slug)
            ->firstOrFail();
        return view('frontend.page.product_details', compact('product'));
    }


    public function product($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('cat_id',$category->id)
            ->where('status', 1)
            ->orderByDesc('id')
            ->paginate(self::WEB_PAGINATOR_NUMBER)
            ->withQueryString();
        return view('frontend.page.product', compact('products', 'category'));
    }




    public function buyNow(Request $request)
    {
        Session::forget('buy_now'); // clear any previous buy now session

        $product_id = (int) $request->product_id;
        $quantity_id = $request->quantity_id ? (int) $request->quantity_id : null;
        $quantity = (int) $request->quantity;
        $ip = $request->ip();

        if (!$quantity || $quantity < 1) {
            return response()->json(['error' => 'Invalid quantity.'], 400);
        }

        $product = DB::table('products')->where('id', $product_id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $price = isset($product->discount_price) ? (float) $product->discount_price : (float) $product->price;
        $quantity_name = '';

        if (!empty($quantity_id)) {
            $productQuantity = DB::table('product_quantities')->where('id', $quantity_id)->first();
            if (!$productQuantity) {
                return response()->json(['error' => 'Invalid quantity selected.'], 400);
            }
            $price = (float) $productQuantity->price;
            $quantity_name = $productQuantity->quantity ?? '';
        }

        $buyNowCart = [
            $product_id => [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $price,
                'quantity' => $quantity,
                'quantity_id' => $quantity_id,
                'quantity_name' => $quantity_name,
                'ip' => $ip,
            ]
        ];

        Session::put('buy_now', $buyNowCart);

        return response()->json([
            'message' => 'Buy Now product added to session. Redirecting...',
            'redirect_url' => route('fcheckout') . '?buy_now=1'
        ]);
    }


}
