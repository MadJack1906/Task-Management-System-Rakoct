<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that ply to the request.
     *ap
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => "required|string|max:255",
            'last_name' => "required|string|max:255",
            'email' => "required|email|unique:users,email|max:255",
            'password' => "required|confirmed|max:255|min:8",
            'password_confirmation' => "required|max:255|min:8",
            'birthday' => ['sometimes', 'before:' . now()]
        ];
    }
}
