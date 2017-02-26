@extends('layout')

@section('js')
    <script src="/js/jsbn.js"></script>
    <script src="/js/jsbn2.js"></script>
    <script src="/js/rsa.js"></script>
    <script src="/js/sha1.js"></script>
    {{--<script>--}}
        {{--function encryptData(){--}}
            {{--var pem="-----BEGIN PUBLIC KEY----- MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDA5Ehy7A/nZ0CB+xikxods0MzID8OQfJof4nCi KAa7dEv4Z/FA5KpxVSPj+ZQjX+zdm7QLHfqOGTz6ac1eOtmBCmm1VtNh5cxRQwR00GV+PTpuaUjO ghL/upcJ8RlC2UAkBMIlw+7O3rZ+B5ykHSWF2fWyX9uk7N9Ls4LUjDLs7QIDAQAB -----END PUBLIC KEY-----";--}}
            {{--var key = RSA.getPublicKey(pem);--}}

            {{--element = document.getElementById('password');--}}
            {{--element.value = RSA.encrypt(element.value,key);--}}
        {{--}--}}
    {{--</script>--}}
@append

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 110px;">
            <div class="panel panel-primary">
                <div class="panel-heading">登录</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}"
                          onsubmit="encryptData()">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">用户名</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> 登录
                                </button>

                                <a class="btn btn-primary" href="{{ url('/password/reset') }}">密码重置</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
