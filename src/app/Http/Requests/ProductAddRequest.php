<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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

    public function rules()
    {
        return [

            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantities.*' => 'nullable|string|min:1|required_if:quantities.*,.size',
            'color.*' => 'nullable|string|min:1|required_if:quantities.*,.color',

        ];
    }




    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

            'product_name.required' => 'The product name is required.',
            'product_name.string' => 'The product name must be a string.',
            'product_name.max' => 'The product name may not be greater than 255 characters.',
            'image.required' => 'The product image is required.',
            'image.image' => 'The product image must be an image file.',
            'image.mimes' => 'The product image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The product image may not be greater than 2048 kilobytes.',
            'quantities.*.required_if' => 'The size is required when quantity is provided.',
            'color.*.required_if' => 'The color is required when quantity is provided.',
        ];
    }
}
