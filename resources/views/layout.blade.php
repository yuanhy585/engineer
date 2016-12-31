<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Engineer</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/blue.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

</head>
<body>
{{--<div class="page-bar" style="padding-left:100px;height:40px;line-height: 40px;">--}}
    {{--contact:123@163.com--}}
    {{--<span style="float:right;padding-right:100px;"><a href="">中文</a>|<a href="">English</a></span>--}}
    {{--<div class="col-md-offset-6"><a href="">中文</a>|<a href="">English</a></div>--}}
{{--</div>--}}

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Engineer</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if(Auth::user())

                @if(Auth::user()->department_id == 5)
                <li class="active"><a href="/">{{trans('home.home')}}</a></li>
                <li><a href="/order_check">{{trans('user.order_check')}}</a></li>
                <li><a href="">{{trans('user.order_distribution')}}</a></li>
                <li><a href="">{{trans('user.price_management')}}</a></li>
                <li><a href="/shops">{{trans('shop.shop_management')}}</a></li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                            {{trans('user.report_check')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                        {{trans('user.HR_management')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/users">{{trans('user.HR_management')}}</a></li>
                        <li><a href="">{{trans('department.department1')}}</a></li>
                        <li><a href="">{{trans('department.department2')}}</a></li>
                        <li><a href="">{{trans('department.department3')}}</a></li>
                        <li><a href="">{{trans('department.department4')}}</a></li>
                        <li><a href="">{{trans('department.department5')}}</a></li>
                    </ul>
                </li>
                <li><a href="/materials">{{trans('material.material_management')}}</a></li>

                <li class="dropdown">
                    <a href="#" class="d/media/kan/18792857786/writingropdown-toggle" data-toggle="dropdown">
                        {{trans('import.file_import')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/province">{{trans('import.province_import')}}</a></li>
                        <li><a href="/material">{{trans('import.material_import')}}</a></li>
                        <li><a href="/status">{{trans('import.status_import')}}</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->department_id == 1)
                {{--<li><a href=">{{trans('shop.my_shop')}}</a></li>--}}
                <li><a href="/myshop">{{trans('shop.sale_order_application')}}</a></li>
                <li><a href="">{{trans('shop.order_administration_detail')}}</a></li>
                @endif

                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="">中文</a></li>--}}
                {{--<li>|</li>--}}
                {{--<li><a href="">English</a></li>--}}
            @if(! Auth::guest())
                    {{--<li><a href="{{url('/login')}}">登录</a></li>    <! why can't i simply write href="/login"? can't approach the route!>--}}
                    {{--<li><a href="{{url('/register')}}">注册</a></li>--}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-expanded="false">
                            {{ Auth::user()->name }}({{Auth::user()->department->title}})<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">修改密码</a></li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="fa fa-btn fa-sign-out"></i>退出
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="margin-top:80px;">
    @yield('content')
</div>

<div class="js">
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('js')
</div>
</body>
</html>