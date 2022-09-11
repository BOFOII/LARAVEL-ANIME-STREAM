<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'register_username' => ['required', 'string', 'between:6,16', 'unique:users,name'],
            'register_email' => ['required', 'string', 'email', 'unique:users,email'],
            'register_password' => ['required', 'string', 'min:8'],
            'register_agree_privacy_policy' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'agree_privacy_policy' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->register_username,
            'email' => $this->register_email,
            'password' => Hash::make($this->register_password),
            'agree_privacy_policy' => true,
        ]);
    }
}
