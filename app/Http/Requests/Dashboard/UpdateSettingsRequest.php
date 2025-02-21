<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role == 'coach';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_name'  => 'required|string|max:255',
            'logo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address'    => 'required|string|max:500',
            'phone'      => 'required|string|max:20|regex:/^(\+?[0-9\s\-]*)$/',
            'email'      => 'required|email|max:255',
            'facebook'   => 'required|url|max:255',
            'twitter'    => 'required|url|max:255',
            'instagram'  => 'required|url|max:255',
            'youtube'    => 'required|url|max:255',
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'site_name.required'  => 'اسم الموقع مطلوب.',
            'site_name.string'    => 'يجب أن يكون اسم الموقع نصيًا.',
            'site_name.max'       => 'يجب ألا يتجاوز اسم الموقع 255 حرفًا.',

            'logo.required'       => 'يجب رفع شعار الموقع.',
            'logo.image'          => 'يجب أن يكون الشعار صورة صحيحة.',
            'logo.mimes'          => 'يجب أن يكون الشعار بصيغة: jpeg, png, jpg, gif, svg.',
            'logo.max'            => 'يجب ألا يتجاوز حجم الشعار 2 ميجابايت.',

            'address.required'    => 'العنوان مطلوب.',
            'address.string'      => 'يجب أن يكون العنوان نصيًا.',
            'address.max'         => 'يجب ألا يتجاوز العنوان 500 حرف.',

            'phone.required'      => 'رقم الهاتف مطلوب.',
            'phone.string'        => 'يجب أن يكون رقم الهاتف نصيًا.',
            'phone.max'           => 'يجب ألا يتجاوز رقم الهاتف 20 حرفًا.',
            'phone.regex'         => 'يجب أن يكون رقم الهاتف صالحًا ويبدأ بـ + أو يحتوي على أرقام فقط.',

            'email.required'      => 'البريد الإلكتروني مطلوب.',
            'email.email'         => 'يجب إدخال بريد إلكتروني صالح.',
            'email.max'           => 'يجب ألا يتجاوز البريد الإلكتروني 255 حرفًا.',

            'facebook.required'   => 'رابط صفحة الفيسبوك مطلوب.',
            'facebook.url'        => 'يجب أن يكون رابط الفيسبوك صالحًا.',
            'facebook.max'        => 'يجب ألا يتجاوز رابط الفيسبوك 255 حرفًا.',

            'twitter.required'    => 'رابط حساب تويتر مطلوب.',
            'twitter.url'         => 'يجب أن يكون رابط تويتر صالحًا.',
            'twitter.max'         => 'يجب ألا يتجاوز رابط تويتر 255 حرفًا.',

            'instagram.required'  => 'رابط حساب انستجرام مطلوب.',
            'instagram.url'       => 'يجب أن يكون رابط انستجرام صالحًا.',
            'instagram.max'       => 'يجب ألا يتجاوز رابط انستجرام 255 حرفًا.',

            'youtube.required'    => 'رابط قناة يوتيوب مطلوب.',
            'youtube.url'         => 'يجب أن يكون رابط يوتيوب صالحًا.',
            'youtube.max'         => 'يجب ألا يتجاوز رابط يوتيوب 255 حرفًا.',
        ];
    }
}
