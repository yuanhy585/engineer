@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form role="form" class="form-group" method="put" action="/users/{{$user->id}}/update">

                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

                    {{trans('user.title')}}:
                    <input type="text" class="form-control" name="name"
                    value="{{$user->name}}"><br/>

                    {{trans('user.email')}}:
                    <input type="email" class="form-control" name="email"
                    value="{{$user->email}}">
                    {!! errors_for('email',$errors) !!}<br/>

                    {{trans('user.language')}}:
                    <select name="language_id" class="form-control">
                        @foreach($languages as $id=>$title)
                            <option name="language_id" value="{{$id}}">
                                {{$title}}
                            </option>
                        @endforeach
                    </select>
                    <br/>

                    {{trans('user.department')}}:
                    <select name="department_id" class="form-control">
                        @foreach($departments as $id=>$title)
                            <option name="department_id" value="{{$id}}">
                                {{$title}}
                            </option>
                        @endforeach
                    </select>
                    <br/>

                    <button type="submit" class="btn btn-info">{{trans('user.submit')}}</button>
                    <a class="btn btn-danger" href="/users/{{$user->id}}/edit">{{trans('user.cancel')}}</a>
                </form>
            </div>

        </div>
    </div>
@stop