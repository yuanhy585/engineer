@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('material.material_show')}}
        </div>
        <br/><hr/>

        <div style="float:right;">
            <a class="btn btn-warning" href="/materials">
                {{trans('material.return')}}
            </a>
        </div>
        <br/>
        {{trans('material.special')}}:
        <div>{{$material->special}}</div>
        <br/>

        {{trans('material.category')}}:
        <div>{{$material->category}}</div>
        <br/>

        {{trans('material.type')}}:
        <div>{{$material->type}}</div>
        <br/>

        {{trans('material.name')}}:
        <div>{{$material->name}}</div>
        <br/>

        {{trans('material.price')}}:
        <div>{{$material->price}}</div>
        <br/>

        {{--<div class="form-inline">--}}
        {{--{{trans('material.visible')}}:&nbsp;&nbsp;--}}
        {{--<input type="radio" name="radio" id="radio1"/>{{trans('material.yes')}}--}}
        {{--&nbsp;&nbsp;&nbsp;--}}
        {{--<input type="radio" name="radio" id="radio2"/>{{trans('material.no')}}--}}
        {{--</div>--}}
        {{--<br/>--}}

    </div>
</div>
@stop