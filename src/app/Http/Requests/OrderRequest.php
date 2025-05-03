<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'required|string|max:20',
            'billing_address' => 'required|string',
            'shipping_address' => 'nullable|string',
            'payment_method' => 'required|integer|in:1,2', // 1 = COD, 2 = Online Payment
            'delivery_location' => 'required|string|in:inside dhaka,outside dhaka,Home Delivery',
        ];

        if ($this->payment_method == 2) {
            $rules['payment_method_name'] = 'required|string|max:255';
            $rules['payment_account_number'] = 'required|string|max:255';
            $rules['trax_id'] = 'required|string|max:255';
        } else {
            $rules['payment_method_name'] = 'nullable|string|max:255';
            $rules['payment_account_number'] = 'nullable|string|max:255';
            $rules['trax_id'] = 'nullable|string|max:255';
        }

        return $rules;
    }
}
