@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                    <a class="btn btn-info" style="float:right;" href="/users">
                        {{trans('user.return')}}
                    </a><br/>

                    {{trans('user.title')}}:
                    <div>{{$user->name}}</div><br/>

                    {{trans('user.email')}}:
                    <div>{{$user->email}}</div><br/>

                    {{trans('user.language')}}:
                    <div>{{$user->language->title}}</div><br/>

                    {{trans('user.department')}}:
                    <div>{{$user->department->title}}</div>
            </div>

        </div>
    </div>
@stop