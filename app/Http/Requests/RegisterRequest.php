<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|unique:users,email',
            'nik' => 'required|max:16',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'jenis_kelamin' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
