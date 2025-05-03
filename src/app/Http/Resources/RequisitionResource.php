<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequisitionResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        $changeStatusArray = explode(',', $this->change_status);
        return [
            'id' => $this->id,
            'requisition_by' => $this->requisitionBy?->full_name,
            'requisition_to' => $this->requisitionTo?->full_name,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'created_at' => $this->created_at->format('d M y, h:i A'),
            'updated_at' => $this->updated_at->format('d M y, h:i A'),
            'reqistion_status' => $this->transformStatus($this->requisitionStatus),
            'reqistion_payment_status' => $this->transformPaymentStatus($this->requisitionPaymentStatus),
            'reqistion_product' => $this->transformProducts($this->products)
        ];
    }
    private function transformProducts($products): array
    {
        return $products->map(function ($product) {
            return [
                'product_id' => $product->id,
                'p_name' => $product->p_name,
                'unit' => $product?->pivot->unit,
                'quantity' => $product->pivot?->quantity,
                'unit_price' => $product->pivot?->unit_price,
                'total_product_price' => $product->pivot?->total_product_price,
            ];
        })->toArray();
    }
    private function transformPaymentStatus($requisitionPaymentStatus): array
    {
        return $requisitionPaymentStatus->map(function ($requisitionPaymentStatu) {
            return [
                'payment_status' => $requisitionPaymentStatu?->pivot->payment_status,
                'status_time' => $requisitionPaymentStatu->pivot->status_time
                ? now()->parse($requisitionPaymentStatu->pivot->status_time)->format('d M y, h:i A')
                : null,
                'user' => $requisitionPaymentStatu->pivot->user_id
                ? User::find($requisitionPaymentStatu->pivot->user_id)->full_name
                : null,
            ];
        })->toArray();
    }
    private function transformStatus($requisitionStatus): array
    {
        return $requisitionStatus->map(function ($requisitionStatu) {
            return [
                'status' => $requisitionStatu?->pivot->status,
                'status_time' => $requisitionStatu->pivot->status_time
                ? now()->parse($requisitionStatu->pivot->status_time)->format('d M y, h:i A')
                : null,
                'user' => $requisitionStatu->pivot->user_id
                ? User::find($requisitionStatu->pivot->user_id)->full_name
                : null,
            ];
        })->toArray();
    }
}
