<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FrontendRegisterRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone_number' => 'required|string|min:10|max:20',
            'gender' => 'required|string|in:male,female',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255',
        ];
    }
}
