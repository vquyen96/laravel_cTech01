<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountRequest extends FormRequest
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
            'email'=>'unique:users,email,'.$this->segment(4).',id|email'
        ];

    }
    public function messages()
    {
        return [
            'email.unique'=>'Email đã bị trùng!',
            'email.email'=>'Email không đúng định dạng'
        ];
        
    }
}
