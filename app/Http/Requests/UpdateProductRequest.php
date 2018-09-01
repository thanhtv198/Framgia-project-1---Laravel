<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'price' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('common.validate.name'),
            'price.required' => trans('common.validate.price'),
            'image.mimes' => trans('common.validate.news_ext'),
            'image.max' => trans('common.validate.news_size'),
        ];
    }
}

