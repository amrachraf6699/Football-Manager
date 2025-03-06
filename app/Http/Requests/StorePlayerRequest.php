<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // السماح بإرسال الطلب
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:20' , 'unique:users,phone'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'parent_id' => ['nullable', 'exists:users,id'],
            'dob' => ['required', 'date', 'before:-7 years'],
            'height' => ['required', 'numeric', 'min:50', 'max:250'],
            'weight' => ['required', 'numeric', 'min:20', 'max:200'],
            'positions' => ['required', 'array', 'min:1'],
            'positions.*.id' => ['required', 'exists:positions,id'],
            'positions.*.rating' => ['required', 'numeric', 'between:0,5'],
            'positions.*.notes' => ['nullable', 'string', 'max:500'], 
        ];
    }

    /**
     * Custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'اسم اللاعب مطلوب.',
            'name.max' => 'يجب ألا يزيد اسم اللاعب عن 255 حرفًا.',
            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.regex' => 'رقم الهاتف غير صالح.',
            'image.required' => 'يجب رفع صورة اللاعب.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة بصيغة jpeg, png, jpg, gif, svg.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',
            'parent_id.exists' => 'ولي الأمر المحدد غير موجود.',
            'dob.required' => 'تاريخ الميلاد مطلوب.',
            'dob.date' => 'تاريخ الميلاد غير صالح.',
            'dob.before' => 'يجب أن يكون اللاعب عمره أكبر من 7 سنوات.',
            'height.required' => 'الطول مطلوب.',
            'height.numeric' => 'يجب أن يكون الطول رقمًا.',
            'height.min' => 'أقل طول مسموح به هو 50 سم.',
            'height.max' => 'أقصى طول مسموح به هو 250 سم.',
            'weight.required' => 'الوزن مطلوب.',
            'weight.numeric' => 'يجب أن يكون الوزن رقمًا.',
            'weight.min' => 'أقل وزن مسموح به هو 20 كجم.',
            'weight.max' => 'أقصى وزن مسموح به هو 200 كجم.',
            'positions.required' => 'يجب تحديد مركز واحد على الأقل.',
            'positions.min' => 'يجب اختيار مركز واحد على الأقل.',
            'positions.array' => 'تنسيق المراكز غير صحيح.',
            'positions.*.id.required' => 'يجب تحديد المركز.',
            'positions.*.id.exists' => 'المركز المحدد غير موجود.',
            'positions.*.rating.required' => 'يجب إدخال التقييم.',
            'positions.*.rating.between' => 'يجب أن يكون التقييم بين 0 و 10.',
            'positions.*.notes.max' => 'يجب ألا تتجاوز الملاحظات 500 حرف.',
        ];
    }
}
