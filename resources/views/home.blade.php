@extends('layout')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron" style="height:200px;line-height:100px;text-align: center;
        font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size:50px;margin-top: 100px;">
            {{trans('home.welcome_message')}}
        </div>
    </div>
</div>
@endsection
