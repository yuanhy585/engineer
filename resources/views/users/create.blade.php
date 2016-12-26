@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form role="form" class="form-group" method="post" action="/users">

                {{csrf_field()}}
                {{trans('user.title')}}:
                <input type="text" class="form-control" name="name" /><br/>

                {{trans('user.email')}}:
                <input type="email" class="form-control" name="email" />
                {!! errors_for('email',$errors) !!}
                <br/>

                {{trans('user.pwd')}}
                <input type="text" class="form-control" name="password" />
                <br/>

                {{trans('user.phone')}}
                <input type="text" class="form-control" name="phone" />
                {!! errors_for('phone',$errors) !!}
                <br/>

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
                <a class="btn btn-danger" href="/users">{{trans('user.cancel')}}</a>
            </form>
        </div>

    </div>
</div>
@stop