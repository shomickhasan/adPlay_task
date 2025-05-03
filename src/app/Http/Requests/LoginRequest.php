<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact' => ['required'],
            'password' => ['required']
        ];

    }

    public function getContact()
    {
        return $this->contact;
    }

    public function generateCredential()
    {
        return [
            ($this->isContactEmail() ? 'email' : 'user_name') => $this->getContact(),
            'password' => $this->get('password')
        ];
    }

    public function isContactEmail(): bool
    {
        if (empty($this->getContact())) return false;

        return filter_var($this->getContact(), FILTER_VALIDATE_EMAIL);
    }


    public function messages()
    {
        if(app()->getLocale() == 'bn'){
            return [
                'contact' => 'ইমেল অথবা ইয়জার নাম ফিল্ড আব্যশক',
                'password' => 'পাসওয়ার্ড ফিল্ড আব্যশক',
            ];
        }
        return [
            'contact' => 'user name and email filed is required',
            'password' => 'password filed is required',
        ];
    }
}
