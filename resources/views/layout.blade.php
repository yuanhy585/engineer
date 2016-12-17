<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Engineer</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/blue.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="#">Engineer</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if(Auth::user())
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="">中文</a></li>
                {{--<li>|</li>--}}
                <li><a href="">English</a></li>
            @if(! Auth::guest())
                    {{--<li><a href="{{url('/login')}}">登录</a></li>    <! why can't i simply write href="/login"? can't approach the route!>--}}
                    {{--<li><a href="{{url('/register')}}">注册</a></li>--}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">修改密码</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="margin-top:150px;">
    @yield('content')
</div>

</body>

</html>