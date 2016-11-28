<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\admin\User;
use App\Http\Requests\login;


// 登陆处理类
class LoginController extends Controller
{

    public function __construct(){

    }

    // 显示登陆模板
    public function login(){


        if(session("uid")){

            return redirect("admin/home");

        }else{

            return view("admin.login");

        }

    }


    // 判断用户登陆规则
    public function loginHandle(login $request){

        

        // 查找数据库用户
        $user = User::where("username","=",$request->input("username"))->first();
        
   
        if(password_verify($request->input("password"),$user->password)){
             session(['uid'=>$user->id,"username"=>$user->username,"company"=>$user->company]);
             return redirect()->route("home");
        }else{
            return back()->withInput(
                 $request->except("_token")
            )->withErrors(["error"=>"用户名和密码不匹配"]);
        }
    }

    //用户退出
    public function loginout(Request $request){
        
        session(['uid'=>null,"company"=>null,"username"=>null]);
        return redirect()->route("login");
    }

}
