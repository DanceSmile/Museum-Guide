<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class poi extends Request
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
            "exhibit_id" => "required|unique:poi,exhibit_id" ,
            "project_id" => "required",
            "coordinate" => "required"
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
