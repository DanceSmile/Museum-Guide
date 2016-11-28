<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="A Components Mix Bootstarp 3 Admin Dashboard Template">
<meta name="author" content="Westilian">
<title>MatMix - A Components Mix Admin Dashboard Template</title>
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
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
<style>
    input{
        background:none;
    }
</style>
</head>
<body class="login-page">
    <div class="page-container">
        <div class="login-branding" style="height:60px;width130px;">
        </div>
        <div class="login-container">
                <div>
                 @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                 @else
                    <h3>四月兄弟</h3>
                 @endif

                </div>

               @yield("content");

        </div>
    </div>
    <script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('js/jRespond.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/nav-accordion.js')}}"></script>
    <script src="{{asset('js/hoverintent.js')}}"></script>
    <script src="{{asset('js/waves.js')}}"></script>
    <script src="{{asset('js/switchery.js')}}"></script>
    <script src="{{asset('js/jquery.loadmask.js')}}"></script>
    <script src="{{asset('js/icheck.js')}}"></script>
    <script src="{{asset('js/bootbox.js')}}"></script>
    <script src="{{asset('js/animation.js')}}"></script>
    <script src="{{asset('js/colorpicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/floatlabels.js')}}"></script>

    <script src="{{asset('js/smart-resize.js')}}"></script>
    <script src="{{asset('js/layout.init.js')}}"></script>
    <script src="{{asset('js/matmix.init.js')}}"></script>
    <script src="{{asset('js/retina.min.js')}}"></script>
</body>

</html>