<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('common.validate.news_title'),
            'content.required' => trans('common.validate.news_content'),
            'image.mimes' => trans('common.validate.news_ext'),
            'image.max' => trans('common.validate.news_size'),
        ];
    }
}

