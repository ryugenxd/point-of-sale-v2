<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=>["required","string","min:3"],
            'password'=>["required","string","min:8"],
            'remember'=>["nullable"]
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'Usernama wajib diisi.',
            'username.string'=>'Username tidak valid',
            'username.min'=>'Username harus memiliki minimal 3 karakter.',
            'password.string'=>'Password tidak valid',
            'password.min'=>'Password harus memiliki minimal 8 karakter.',
            'password.required'=>'Password wajib diisi.',
        ];
    }
}
