<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StorePositionRequest extends FormRequest
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
            'name'        => 'required|string|max:255|unique:positions,name',
            'description' => 'nullable|string',
            'code'        => 'required|string|max:10|unique:positions,code',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required'  => 'اسم المركز مطلوب.',
            'name.unique'    => 'اسم المركز موجود بالفعل.',
            'code.unique'    => 'كود المركز موجود بالفعل.',
            'code.max'       => 'كود المركز يجب ألا يتجاوز 10 أحرف.',
        ];
    }
}
