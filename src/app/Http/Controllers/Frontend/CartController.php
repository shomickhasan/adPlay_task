<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Retrieve data from request
        $product_id = (int) $request->product_id;
        $size_id = $request->size ? (int) $request->size : null;
        $color = $request->color ? (string) $request->color : null;
        $quantity = $request->quantity ? (int) $request->quantity : 1;
        $frontendTotalPrice = (float) $request->total_price;

        $ip = $request->ip();
        $cart = Session::get('cart', []);

        $product = DB::table('products')->where('id', $product_id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        if (!empty($size_id)) {
            $productQuantity = DB::table('product_quantities')->where('id', $size_id)->first();
            if (!$productQuantity) {
                return response()->json(['error' => 'Invalid size selection'], 400);
            }
            $unitPrice = (float) $productQuantity->price;
            $quantityName = (string) $productQuantity->quantity; // Quantity name (size name)
        } else {

            $unitPrice = isset($product->discount_price) ? (float) $product->discount_price : (float) $product->price;
            $quantityName = '';
        }

        $calculatedTotal = $unitPrice * $quantity;


        if (round($calculatedTotal, 2) !== round($frontendTotalPrice, 2)) {
            return response()->json(['error' => 'Price mismatch detected'], 400);
        }


        $cartKey = $product_id . '_' . ($size_id ?? '0') . '_' . ($color ?? 'none');


        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            // Add new product to the cart
            $cart[$cartKey] = [
                'id'             => (int) $product->id,
                'name'           => (string) $product->product_name,
                'price'          => $unitPrice,
                'quantity'       => $quantity,
                'size_id'        => $size_id,
                'quantity_name'  => $quantityName,
                'color'          => $color,
                'total_price'    => $calculatedTotal,
                'ip'             => $ip,
            ];
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        // Return response with cart details
        return response()->json([
            'message' => 'Product added to cart',
            'cart'    => $cart
        ]);
    }

    public function cartCount(){
        return response()->json([
            'cartCount' => count(session('cart', []))]);
    }















}
