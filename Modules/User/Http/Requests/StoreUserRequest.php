<?php

namespace Modules\User\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
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
            'role_id' => ['required', 'exists:roles,id'],
            'password' => ['required'],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'نام فیلد اجباری است',
            'first_name.string' => 'نام باید متن باشد',
            'first_name.max' => 'تعداد کاراکتر نام حداکثر 255 کاراکتر باشد',
            'last_name.required' => 'نام خانوادگی فیلد اجباری است',
            'last_name.string' => 'نام خانوادگی  باید متن باشد',
            'last_name.max' => 'تعداد کاراکتر نام حانوادگی حداکثر 255 کاراکتر باشد',
//            'role.boolean' => 'فیلد نقش باید مقدار 0 یا 1 داشته باشد',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

}
