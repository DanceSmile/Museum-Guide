<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addExhibit extends Request
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
            "title" => "required" ,
             "music" => "required" ,
             "pic" => "required" ,
        ];
    }

    public  function message(){
        return [
            "title.required" => "产品的名称不能为空",

        ];
    }
}
