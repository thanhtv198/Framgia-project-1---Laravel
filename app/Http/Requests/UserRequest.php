<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'phone_number' => 'required',
            'local_id' => 'required',
            'email' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('common.validate.name'),
            'phone_number.required' => trans('common.validate.phone_number'),
            'email.required' => trans('common.validate.email'),
            'email.email' => trans('common.validate.valid_email'),
            'address.required' => trans('common.validate.address'),
            'local_id.required' => trans('common.validate.local_id'),
            'birthday.required' => trans('common.validate.birthday'),
            'password.required' => trans('common.validate.password'),
            'password.min' => trans('common.validate.valid_password'),
            'password.confirmed' => trans('common.validate.repassword'),
        ];
    }
}
