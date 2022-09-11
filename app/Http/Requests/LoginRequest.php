<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login_email' => ['required', 'string', 'email'],
            'login_password' => ['required', 'string', 'min:8'],
            'email' => ['required'],
            'password' => ['required'],
            'remember_me' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'email' => $this->login_email,
            'password' => $this->login_password,
        ]);
    }
}
