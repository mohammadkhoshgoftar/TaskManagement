<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UpdateTaskRequest extends FormRequest
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
            'description'   => ['required', 'string'],
            'user_id'       => ['required', 'exists:users,id'],
            'order'         => ['required', 'integer'],
            'status'        => ['required', 'string', 'max:255'],
            'deadline'      => ['required', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'عنوان تسک اجباری است',
            'title.string' => 'عنوان تسک باید متن باشد',
            'title.max' => 'تعداد کاراکتر عنوان تسک حداکثر 255 کاراکتر باشد',
            'description.required' => 'توضیحات فیلد اجباری است',
            'user_id.required' => 'کاربر فیلد اجباری است',
            'user_id.exists' => 'چنین کاربری وجود ندارد',
            'order.required' => 'اولویت فیلد اجباری است',
            'order.integer' => 'اولویت باید مقدار عددی داشته باشد',
            'status.required' => 'وضعیت فیلدی اجباری است',
            'status.string' => 'وضعیت تسک باید متن باشد',
            'status.max' => 'تعداد کاراکتر وضعیت تسک حداکثر 255 کاراکتر باشد',
            'deadline.required' => 'زمان انجام فیلدی اجباری است',
            'deadline.string' => 'زمان انجام باید متن باشد است',
            'category_id.exists' => 'دسته بندی وجود ندارد',

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
