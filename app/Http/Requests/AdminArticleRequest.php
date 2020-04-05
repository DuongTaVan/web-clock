<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminArticleRequest extends FormRequest
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
            'a_name'          => 'required|max:190|min:3|unique:articles,a_name,'.$this->id,
            'a_price'         => 'required',
            'a_description'   => 'required',
            'a_menu_id'   => 'required',
            'a_content'       => 'required',
        ];
    }
    public function messages()
    {
        return [
            'a_name.required'          => 'Dữ liệu không được để trống',
            
        ];
    }
}
