<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'full_name'=> 'required|max:50|min:3',
            'user_name'=> [
                'required',
                'min:3',
                'max:15',
                Rule::unique('users')->ignore($this->user),
            ],
            'phone'=> [
                'required',
                'min:10',
                'max:15',
                Rule::unique('users')->ignore($this->user),
            ],
            'status'=> 'required',
            'user_access'=> 'nullable',
            'photo' => 'nullable | mimes:jpg,png,jpeg',
            'email'=>  [
                'nullable',
                'email',
                Rule::unique('users')->ignore($this->user),
            ],
            'password'=> 'nullable|min:6|max:20',

        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'The full name filed is required',
            'full_name.min' => 'The full name field must be at least 3 characters.',
            'full_name.max' => 'The full name  field must not be greater than 50 characters.',

            'user_name.required' => 'The user name filed is required',
            'user_name.min' => 'The user name field must be at least 3 characters.',
            'user_name.max' => 'The user name  field must not be greater than 15 characters.',
            'user_name.unique' => 'The user name field has already been taken',

            'phone.required' => 'The phone filed is required',
            'phone.min' => 'The phone field must be at least 10 characters.',
            'phone.max' => 'The phone  field must not be greater than 15 characters.',
            'phone.unique' => 'The phone field has already been taken',

            'password.required' => 'The password filed is required',
            'password.min' => 'The password field must be at least 6 characters.',
            'password.max' => 'The password field must not be greater than 20 characters.',

            'email.email' => 'The email field must be valid email address.',
            'email.unique' => 'The email field has already been taken',

            'status.required' => 'The status filed is required',
        ];
    }
}
