<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
        return [
            'email' => 'required',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('common.validate.email'),
            'email.email' => trans('common.validate.valid_email'),
            'password.required' => trans('common.validate.password'),
            'password.min' => trans('common.validate.valid_password'),
        ];
    }
}

