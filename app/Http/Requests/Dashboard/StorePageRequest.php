<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'required|boolean',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return
        [
            'title.required' => 'عنوان الصفحة مطلوب',
            'title.string' => 'عنوان الصفحة يجب ان يكون نص',
            'title.max' => 'عنوان الصفحة يجب ان لا يتجاوز 255 حرف',
            
            'content.required' => 'محتوى الصفحة مطلوب',
            'content.string' => 'محتوى الصفحة يجب ان يكون نص',

            'is_active.required' => 'حالة الصفحة مطلوبة',
            'is_active.boolean' => 'حالة الصفحة يجب ان تكون صحيحة',

            'cover.required' => 'صورة الصفحة مطلوبة',
            'cover.image' => 'صورة الصفحة يجب ان تكون صورة',
            'cover.mimes' => 'صورة الصفحة يجب ان تكون من الانواع التالية: jpeg,png,jpg,gif,svg',
            'cover.max' => 'صورة الصفحة يجب ان لا تتجاوز 4096 كيلوبايت',
        ];
    }
}
