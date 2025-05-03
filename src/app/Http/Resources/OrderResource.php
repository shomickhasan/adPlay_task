<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'outlet_name' => $this->outlet?->outlet_name,
            'outlet_address' => $this->outlet?->outlet_address,
            'order_by' =>  $this->orderBy?->full_name,
            'order_to' =>  $this->orderTo?->full_name,
            'sub_total' => $this->sub_total,
            'discount' => $this->discount,
            'vat' => $this->vat,
            'grand_total' => $this->grand_total,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'created_at' => $this->created_at->format('d M y, h:i A'),
            'updated_at' => $this->updated_at->format('d M y, h:i A'),
            'order_status' => $this->transformStatus($this->orderStatus),
            'order_payment_status' => $this->transformPaymentStatus($this->orderPaymentStatus),
            'order_product' => $this->transformProducts($this->products)
        ];
    }

    private function transformProducts($products): array
    {
        return $products->map(function ($product) {
            return [
                'product_id' => $product->id,
                'p_name' => $product->p_name,
                // 'unit' => $product?->pivot->unit,
                'quantity' => $product->pivot?->quantity,
                'price' => $product->pivot?->price,
                'total_price' => $product->pivot?->total_price,
            ];
        })->toArray();
    }
    private function transformStatus($orderStatus): array
    {
        return $orderStatus->map(function ($orderStatu) {
            return [
                'status' => $orderStatu?->pivot->status,
                'status_time' => $orderStatu->pivot->status_time
                ? now()->parse($orderStatu->pivot->status_time)->format('d M y, h:i A')
                : null,
                'user' => $orderStatu->pivot->user_id
                ? User::find($orderStatu->pivot->user_id)?->full_name
                : null,
            ];
        })->toArray();
    }

    private function transformPaymentStatus($orderPaymentStatus): array
    {
        return $orderPaymentStatus->map(function ($orderPaymentStatu) {
            return [
                'payment_status' => $orderPaymentStatu?->pivot->payment_status,
                'status_time' => $orderPaymentStatu->pivot->status_time
                ? now()->parse($orderPaymentStatu->pivot->status_time)->format('d M y, h:i A')
                : null,
                'user' => $orderPaymentStatu->pivot->user_id
                ? User::find($orderPaymentStatu->pivot->user_id)?->full_name
                : null,
            ];
        })->toArray();
    }
}
