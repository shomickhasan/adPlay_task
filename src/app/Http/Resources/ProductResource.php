<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_name' => $this->p_name,
            'description' => $this->description,
            'price' => $this->selling_price,
            'status' => $this->status,
            'brand' => $this->brand->b_name ?? null,
            'categories' => SubCategoryResource::collection($this->subCategories),
            'image' => config('image.path') . $this->image,
         ];
    }
}