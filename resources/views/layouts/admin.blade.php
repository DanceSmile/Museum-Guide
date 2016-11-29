<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Components Mix Bootstarp 3 Admin Dashboard Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Westilian">
    <title>有伴博物馆系统 - 四月兄弟 Aprbrother</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/waves.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/components.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/common-styles.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/pages.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/matmix-iconfont.css')}}" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
    @yield("load")
    <style>
        .font{
                font-family: Microsoft YaHei;
        }
    </style>
</head>
<body>
<div class="page-container list-menu-view">
<!--Leftbar Start Here -->
<div class="left-aside desktop-view">
    <div class="aside-branding">
        <a href="index.html" class="iconic-logo"><img src="{{asset('images/logo-iconic.png')}}" alt="Matmix Logo">
        </a>
        <a href="index.html" class="large-logo"><img src="{{asset('images/logo-large.png')}}" alt="Matmix Logo">
        </a><span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
        <span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
    </div>
    <div class="left-navigation">
        <ul class="list-accordion">

            <li><a href="{{url('admin')}}" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">Admin Home</span></a>
            </li>

            <li><a href="{{url('admin/goods')}}" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">展品管理</span></a>
            </li>
            <li><a href="{{url('admin/exhibit')}}" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">展览管理</span></a>
            </li>
            <li><a href="{{route('admin.statistics.index')}}" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">数据统计</span></a>
            </li>
            <li><a href="{{route('admin.config.index')}}" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">用户配置</span></a>
            </li>
            <li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">设备管理</span></a>
            </li>
           
            <li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Form Elements</span></a>
                <ul>
                    <li><a href="basic-forms.html">Basic Form Elements</a>
                    </li>
                    <li><a href="advanced-form-elements.html">Advanced Form Elements</a>
                    </li>
                    <li><a href="summernote-wysiwyg.html">Summernote WYSIWYG Editor </a>
                    </li>
                    <li><a href="date-picker.html">Date Pickers</a>
                    </li>
                    <li><a href="color-picker.html">Colors Pickers</a>
                    </li>
                    <li><a href="form-validation.html">Form Validation</a>
                    </li>
                    <li><a href="advanced-form-validation.html">Advanced Form Validation</a>
                    </li>
                    <li><a href="signup.html">Signup  <span class="label label-primary">New</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="page-content">
<!--Topbar Start Here -->
<header class="top-bar">
    <div class="container-fluid top-nav">
        <div class="search-form search-bar">
            <form>
                <input name="searchbox" value="" placeholder="Search Topic..." class="search-input">
            </form>
            <span class="search-close waves-effect"><i class="ico-cross"></i></span>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="clearfix top-bar-action">
                    <span class="leftbar-action-mobile waves-effect"><i class="fa fa-bars "></i></span>
                    <span class="leftbar-action desktop waves-effect"><i class="fa fa-bars "></i></span>
						<span class="waves-effect search-btn mobile-search-btn">
						<i class="fa fa-search"></i>
						</span>
                    <span class="rightbar-action waves-effect"><i class="fa fa-bars"></i></span>
                </div>
            </div>
            <div class="col-md-4 responsive-fix top-mid">
               
                       
            </div>
            <div class="col-md-6 responsive-fix">
                <div class="top-aside-right">
                    <div class="user-nav" style="margin-right:0px;">
                        <ul>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#" class="clearfix dropdown-toggle waves-effect waves-block waves-classic">
                                    <span class="user-info">{{session("company")}} <cite>{{session("username")}}</cite></span>
                                    <span class="user-thumb"><img src="{{asset('images/avatar/jaman.jpg')}}" alt="image"></span>
                                </a>
                                <ul role="menu" class="dropdown-menu fadeInUp">
                                    <li><a href="#"><span class="user-nav-icon"><i class="fa fa-briefcase"></i></span><span class="user-nav-label">My Account</span></a>
                                    </li>
                                    <li><a href="#"><span class="user-nav-icon"><i class="fa fa-user"></i></span><span class="user-nav-label">View Profile</span></a>
                                    </li>
                                    <li><a href="#"><span class="user-nav-icon"><i class="fa fa-cogs"></i></span><span class="user-nav-label">Settings</span></a>
                                    </li>
                                    <li><a href="{{url("loginout")}}"><span class="user-nav-icon"><i class="fa fa-lock"></i></span><span class="user-nav-label">退出登陆</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@yield("section")
<!--Footer Start Here -->
<footer class="footer-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="footer-left">
                    <span>&copy; 2016 <a href="http://aprbrother.com">有伴博物馆系统</a></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="footer-right">
                    <span class="footer-meta">author by 四月兄弟</span>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>





<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/layer.js')}}"></script>
<!-- <script src="{{asset('js/vue.js')}}"></script> -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield("js")

</body>
</html>