<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
        return 
        [
            'name'      => 'required|max:100',
            'email'     => 'max:100',
            'logo'      => 'max:300',
            'website'   => 'max:300'
        ];
    }
}
