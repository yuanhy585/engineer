@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form role="form" class="form-inline" action="/users">
                    <input type="text" class="form-control" name="findByUserName"
                           placeholder="{{trans('user.placeholder')}}"
                    value="{{isset($a['findByUserName'])?$a['findByUserName']:""}}" />
                    <button type="submit" class="btn bg-primary">搜索</button>
                </form>
            </div>
            <a class="btn btn-primary" href="/users/create" style="float:right;">
                {{trans('user.user_create')}}
            </a>
        </div>
        <br/><br/>
    {{--</div>--}}
    {{--<div class="container">--}}
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <td>{{trans('user.title')}}</td>
                            <td>{{trans('user.email')}}</td>
                            <td>{{trans('user.department')}}</td>
                            <td>{{trans('user.operation')}}</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="/users/{{$user->id}}">{{$user->name}}</a>
                            </td>
                            <td>{{$user->email}}</td>
                            @if($user->role_id == 1)
                                <td>销售部</td>
                            @elseif($user->role_id == 2)
                                <td>管理部</td>
                            @elseif($user->role_id == 3)
                                <td>市场部</td>
                            @elseif($user->role_id == 4)
                                <td>工程部</td>
                            @elseif($user->role_id == 5)
                                <td>项目部</td>
                            @endif
                            <td>
                                <form class="form-inline">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">

                                    <a class="btn btn-primary" href="/users/{{$user->id}}/edit">{{trans('user.edit')}}</a>
                                    <button class="btn btn-danger">{{trans('user.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="text-center">
            {!! $users->appends(['select'=>isset($a)?json_encode($a):""])->render() !!}
        </div>
    </div>

@stop