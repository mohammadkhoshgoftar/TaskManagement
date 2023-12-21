<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
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
            'title'         => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'عنوان دسته بندی اجباری است',
            'title.string' => 'عنوان دسته بندی باید متن باشد',
            'title.max' => 'تعداد کاراکتر عنوان دسته بندی حداکثر 255 کاراکتر باشد',

        ];
    }

    public function failedValidation(Validator $validator)
    {
        $message = 'Validation errors';
        throw Response::error($message, $validator->errors());
    }
}
