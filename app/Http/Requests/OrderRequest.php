<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'email.email' => trans('common.validate.email'),
            'name.required' => trans('common.validate.name'),
            'address.required' => trans('common.validate.address'),
            'phone_number.required' => trans('common.validate.phone_number'),
        ];
    }
}

