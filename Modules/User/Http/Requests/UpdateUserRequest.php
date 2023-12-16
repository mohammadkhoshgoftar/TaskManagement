<?php

namespace Modules\User\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'role_id' => ['required', 'boolean','exists:roles,id'],
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'نام فیلد اجباری است',
            'firstName.string' => 'نام باید متن باشد',
            'firstName.max' => 'تعداد کاراکتر نام حداکثر 255 کاراکتر باشد',
            'lastName.required' => 'نام خانوادگی فیلد اجباری است',
            'lastName.string' => 'نام خانوادگی  باید متن باشد',
            'lastName.max' => 'تعداد کاراکتر نام حانوادگی حداکثر 255 کاراکتر باشد',
            'mobile.required' => 'موبایل فیلد اجباری است',
            'mobile.digits' => 'موبایل باید شامل اعداد باشد',
            'mobile.max' => 'تعداد ارقام موبایل نامعتبر است',
            'mobile.min' => 'تعداد ارقام موبایل نامعتبر است',
            'role.boolean' => 'فیلد نقش باید مقدار 0 یا 1 داشته باشد',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
