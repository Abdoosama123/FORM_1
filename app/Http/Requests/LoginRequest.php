<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return ['name' => 'required|max:255|min:3',
            'email'    => 'required|max:100|min:5',
            'password' => 'required|max:30|min:3',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
            'terms'    => 'accepted'
        ];
    }
    public function messages()
    {
        return [
            'image.mimes'                => 'صيغة الصورة غير مسموحة',
            'image.required'             => 'يجب اختيار صوره',
            'name.required'              => 'يجب ادخال الاسم',
            'email.required'             => 'يجب ادخال الإيميل',
            'password.required'          => 'يجب ادخال كلمة مرور',
            'password.min'               => 'الحد الادني لكلمة المرور : 6 أحرف',
        ];
    }

}
