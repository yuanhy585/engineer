@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form role="form" class="form-group" action="/users">
                {{trans('user.title')}}:
                <input type="text" class="form-control" name="username"><br/>
                {{trans('user.real_name')}}:
                <input type="text" class="form-control" name="realname"><br/>
                {{trans('user.language')}}:
                <select class="form-control">
                    <option name="language_id" value="{{Auth::user()->language_id}}">
                        {{Auth::user()->language->title}}
                    </option>
                </select><br/>
                {{trans('user.department')}}:
                <select class="form-control">
                    @foreach($departments as $department)
                        <option name="department_id" value="{{$department->id}}">
                            {{$department->title}}
                        </option>
                    @endforeach
                </select>
                <br/>
                <button class="btn btn-info">{{trans('user.submit')}}</button>
                <button class="btn btn-danger">{{trans('user.cancel')}}</button>
            </form>
        </div>

    </div>
</div>
@stop