<?php

namespace Modules\Permission\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Modules\Permission\Http\Resources\RoleResource;
use Modules\Permission\Repository\RoleRepository;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255',Rule::unique('roles')->ignore((int)$this->route('id'))],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام نقش فیلد اجباری است',
            'name.string' => 'نام نقش باید متن باشد',
            'name.max' => 'تعداد کاراکتر نام نقش حداکثر 255 کاراکتر باشد',
            'name.unique' => 'نقشی با این نام وجود دارد'
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
