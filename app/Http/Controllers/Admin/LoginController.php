<?php

namespace App\Http\Controllers\Admin;

use validator;
use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\admin\User;

class LoginController extends Controller
{

    // 显示登陆模板
    public function login(){


        return view("admin.login");

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }



    // 判断用户登陆规则
    public function loginHandle(Request $request){


        // 实例化UserModel模型
        $userModel = new User();
        
        // 获取用户输入的账号和密码
        $username = $request->input("username");
        $password = $request->input("password");
       
        if(!$username || !$password){

            return  back();
        }

        // 查找数据库并且解密密码
        $user = $userModel::where("username","=",$username)->select("password")->first();

        if(!$user->password){
            return back();
        }

        $password = bcrypt($password);
        if($password == $user->password){
             session('uid',$repassword->id);
             return redirect()->route("home");
        }else{
            back();
        }

        





    }

}