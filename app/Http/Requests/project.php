<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class project extends Request
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
            "pname" => "required|unique:project,pname" ,
            "map" => "required"
        ];
    }

    public function messages()
    {
        return [
            'pname.required'     =>     '展览主题不能为空',
            'pname.unique'       =>     '展览主题重复',
            "map.required"       =>     "展览地图不能为空",
        ];
    }


}
