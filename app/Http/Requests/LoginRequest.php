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
            'password' => 'required|max:100|min:3',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
            'terms'    => 'accepted'
        ];
    }
    public function messages()
    {
        return [
            'image.mimes'                => __('messages.Image format is not allowed'),
            'image.required'             => __('messages.His photo must be selected'),
            'name.required'              => __('messages.Name is required'),
            'email.required'             => __('messages.You must enter the email'),
            'password.required'          => __('messages.You must enter a password'),
            'password.min'               => __('messages.Minimum password: 6 characters'),
        ];
    }

}
