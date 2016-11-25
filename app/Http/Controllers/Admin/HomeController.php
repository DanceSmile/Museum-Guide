<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends BaseController
{
    //用户首页
    public function  index (){


        return view ("admin.index");

    }
}
