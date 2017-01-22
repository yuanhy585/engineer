@extends('layout')
@section('js')
<script src="/js/linkage.js"></script>
@append
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('sale.seller_info_edit')}}
        </div>
        <br/><hr/>
    </div>

    <div class="form col-md-5">
        <form method="post" action="/user/sale/{{$user->id}}/update">

            {{csrf_field()}}

             {{trans('sale.seller_name')}}:
            <input type="text" name="name" class="form-control"
                value="{{$user->name}}" style="margin-bottom:10px;"/>

            {{trans('sale.phone')}}:
            <input type="text" name="phone" class="form-control"
                   value="{{$user->phone}}" style="margin-bottom:10px;"/>
            {!! errors_for('phone',$errors) !!}

            {{trans('sale.province')}}:
            <select id="province_id" name="province" class="form-control"
                    style="margin-bottom:10px;">
                @foreach($provinces as $id => $name)
                    <option  value="{{$id}}" @if($user->city->province->id == $id) selected @endif>
                        {{$name}}
                    </option>
                @endforeach
            </select>

            {{trans('sale.city')}}:
            <select id="city_id" name="city_id" class="form-control"
                    style="margin-bottom:10px;">
                @foreach($cities as $id => $name)
                    <option value="{{$id}}" @if($user->city_id == $id) selected @endif>
                        {{$name}}
                    </option>
                @endforeach
            </select>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    {{trans('sale.update_submit')}}
                </button>
                <a href="/user/sale" class="btn btn-danger" style="margin-left:20px;">
                    {{trans('sale.cancel')}}
                </a>
            </div>
        </form>
    </div>


</div>
@stop