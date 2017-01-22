@extends('layout')
@section('js')
<script src="/js/linkage.js"></script>
@append
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('sale.sale_create')}}
        </div>
        <br/><hr/>
    </div>
    <div class="form">
        <div class="col-md-5">
            <form method="post" action="/user/sale" role="form">

                {{csrf_field()}}

                <div>
                    <input type="hidden" name="department_id" class="form-control"
                           value="1" />

                    {{trans('sale.seller_name')}}:
                    <input type="text" name="name" class="form-control" />

                    {{trans('sale.password')}}:
                    <input type="password" name="password" class="form-control"
                            style="margin-bottom: 10px;"/>

                    {{trans('sale.phone')}}:
                    <input type="text" class="form-control" name="phone"
                           style="margin-bottom: 10px;"/>
                    {!! errors_for('phone',$errors) !!}

                    {{trans('sale.email')}}:
                    <input type="email" class="form-control" name="email"
                            style="margin-bottom: 10px;"/>
                    {!! errors_for('email',$errors) !!}

                    {{trans('sale.attachment')}}:
                    <select name="manager_id" class="form-control" style="margin-bottom: 10px;">
                        @foreach($managers as $manager)
                        <option value="{{$manager->id}}">
                            {{$manager->name}} {{$manager->phone}}
                        </option>
                        @endforeach
                    </select>

                    {{trans('sale.province')}}:
                    <select id="province_id" name="province_id" class="form-control"
                            style="margin-bottom: 10px;">
                        @foreach($provinces as $id => $name)
                            <option value="{{$id}}" @if($province_id == $id) selected @endif>
                                {{$name}}
                            </option>
                        @endforeach
                    </select>

                    {{trans('sale.city')}}:
                    <select id="city_id" name="city_id" class="form-control"
                            style="margin-bottom: 10px;">
                        @foreach($cities as $id => $name)
                            <option value="{{$id}}" @if($city_id == $id) selected @endif>
                                {{$name}}
                            </option>
                        @endforeach
                    </select>

                    {{trans('sale.language')}}:
                    <select name="language_id" class="form-control" style="margin-bottom: 10px;">
                        @foreach($languages as $id => $name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="text-center" style="margin-bottom: 20px;">
                    <button type="submit" class="btn btn-success">
                        {{trans('sale.submit')}}
                    </button>
                    <a class="btn btn-danger" href="/user/sale" style="margin-left:20px;">
                        {{trans('sale.return')}}
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@stop