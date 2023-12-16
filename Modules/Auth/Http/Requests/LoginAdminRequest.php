<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginAdminRequest extends FormRequest
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
            'email' => ['required','email','exists:users,email'],
            'password' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => ' ایمیل را وارد کنید',
            'email.email' => 'فرمت ایمیل نادرست است',
            'email.exists' => 'ایمیل یا رمز عبور شما اشتباه است',
            'password.required' => 'رمز عبور را وارد کنید',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
