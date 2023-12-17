<?php

namespace Modules\Permission\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionsToRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'role_id' => ['required', 'exists:roles,id'],
            'permissions' => ['required', 'array'],
        ];
    }

    public function messages(): array
    {
        return [
            'role_id.required' => ' نقش فیلد اجباری است',
            'role_id.exists' => 'نقشی وجود ندارد',
            'permissions.required' => 'سطح دسترسی اجباری است',
            'permissions.array' => 'سظح دسترسی ها باید به صورت آرایه ارسال شوند'
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
