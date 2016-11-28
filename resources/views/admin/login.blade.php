@extends('layouts.login')

@section('content')

 {{-- 表单开始 --}}
    <form class="form-signin" action="{{url('loginHandle')}}" method="post"  >

        {{csrf_field()}}
        <input type="text" id="inputEmail" class="form-control floatlabel " placeholder="用户名"  autofocus name="username" value="{{old('username')}}">
        <input type="password" id="inputPassword" class="form-control floatlabel " placeholder="密码"  name='password' value="{{old('password')}}">
        <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" class="switch-mini" /> 记住我
            </label>
        </div>
        <button class="btn btn-primary btn-block btn-signin" type="submit">登录</button>
    </form>
{{-- 表单结束 --}}

@endsection

