<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest1 extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',

        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn Chưa Nhập Email',
            'email.email' => 'đây không phải là email ',
            'email.unique' => 'Email này Đã tồn tại rồi ',

            'password.required' => 'Bạn Chưa Nhập Password',
            'password.min' => 'Mật Khẩu Phải Đủ 8 Kí Tự Trở Lên',
            'password.confirmed' => 'Mật Khẩu Không Trùng Khớp',


        ];
    }

}