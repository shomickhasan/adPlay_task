<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductQuantity;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        $filters = $request->only(['created_at', 'product_name', 'status', 'ordering', 'category_id']);
        $sortOrder = $request->ordering ?? 'desc';
        $products = Product::filters($filters)
            ->OrderByDescId()
            ->paginate(self::WEB_PAGINATOR_NUMBER)
            ->withQueryString();


        return $request->ajax()
            ? view('backend.pages.product.filter', compact('products',))
            : view('backend.pages.product.index', compact('products',));
    }
    public function create(Request $request){
        return view('backend.pages.product.create');
    }
    public function store(ProductAddRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            // Upload main product image
            $imagePath = $this->UploadImage($request, 'image', 'images/products');

            // Create the product
            $product = Product::create([
                'product_name' => $request->product_name,
                'slug' => Str::slug($request->product_name),
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath,
            ]);

            // Save sizes (quantities)
            if ($request->quantities && is_array($request->quantities)) {
                foreach ($request->quantities as $quantity) {
                    if (!empty($quantity)) {
                        ProductQuantity::create([
                            'product_id' => $product->id,
                            'quantity' => $quantity,
                        ]);
                    }
                }
            }

            // Save colors
            if ($request->colors && is_array($request->colors)) {
                foreach ($request->colors as $color) {
                    if (!empty($color)) {
                        ProductColor::create([
                            'product_id' => $product->id,
                            'color_code' => $color,
                        ]);
                    }
                }
            }

            if ($request->hasFile('gallery_images')) {
                $galleryImagePaths = $this->UploadMultipleImages($request->file('gallery_images'), 'images/products');

                foreach ($galleryImagePaths as $galleryImagePath) {
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'gallery_image' => $galleryImagePath,
                    ]);
                }
            }


            DB::commit();

            return response()->json(['success' => true, 'message' => 'Product created successfully!']);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error creating product: ', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'There was an error creating the product.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('backend.pages.product.edit', compact('product', 'categories'));
    }
    public function update(ProductAddRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);


            if ($request->hasFile('image')) {
                $this->deleteExistingImage($product->image);
                $imagePath = $this->UploadImage($request, 'image', 'images/products');
            } else {
                $imagePath = $product->image;
            }

            // Update main product details
            $product->update([
                'cat_id' => $request->cat_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'shipping_info' => $request->shipping_info,
                'image' => $imagePath,
                'stoke_status' => $request->stoke_status,
                'status' => $request->status,
                'is_feater_product' => $request->is_feater_product,
                'is_trending_product' => $request->is_trending_product,
                'is_show_home' => $request->is_show_home,
            ]);

            // Handle product quantities
            if ($request->has('quantities')) {
                foreach ($request->quantities as $index => $quantity) {
                    $quantityId = $request->qunatity_id[$index] ?? null;


                    if ($quantityId) {
                        $existingQuantity = $product->productQuantitys()->find($quantityId);
                        if ($existingQuantity) {
                            $existingQuantity->update([
                                'quantity' => $quantity,
                                'price' => $price,
                            ]);
                        }
                    } else {
                        $product->productQuantitys()->create([
                            'quantity' => $quantity,
                            'price' => $price,
                        ]);
                    }
                }
            }

            return response()->json(['success' => 'Product updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    public function deleteQuantity($quantityId)
    {
        // Find the quantity record by ID
        $quantity = ProductQuantity::find($quantityId);

        // Check if the record exists
        if ($quantity) {
            // Delete the quantity record
            $quantity->delete();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Quantity deleted successfully']);
        }

        // Return error response if the quantity record is not found
        return response()->json(['success' => false, 'message' => 'Quantity not found'], 404);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            {
                $this->deleteExistingImage($product->image);
            }
        }
        $data = $product->delete();
        return response()->json([
            'data'=>$data,
            'success' => 'Product deleted successfully!'
        ]);

    }

    public function toggleStatus($id)
{
    $quantity = ProductQuantity::find($id);

    if (!$quantity) {
        return response()->json(['success' => false, 'message' => 'Quantity not found'], 404);
    }

    if($quantity->status == 1)
    {
        $quantity->status = 0;
        $quantity->save();
    }else{
        $quantity->status = 1;
        $quantity->save();
    }


    return response()->json([
        'success' => true,
        'message' => 'Quantity status updated successfully.',
        'status' => $quantity->status
    ]);
}

}
