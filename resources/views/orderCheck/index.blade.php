@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('user.order_check')}}
        </div>
        <br/><hr/>
    </div>
    <div class="row">
        <div class="col-md-2 sidebar">
            <ul class="list-group">
                @foreach($statuses as $status)
                <li class="list-group-item">
                    <a href="">{{$status->name}}</a> <span class="badge">0</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10" style="margin-top:10px;">
            <form class="form-inline" action="/order_check" role="form">
                @include('shops.linkage')
                <div class="search" style="margin-top:10px;">
                    <input type="text" class="form-control" name="findByUserName"
                           placeholder="{{trans('order.input_shop_user')}}"/>
                    <button class="btn btn-primary" type="submit">
                        {{trans('order.search')}}
                    </button>
                </div>
            </form>
            <br/>
            <button class="btn btn-primary" style="margin-bottom:5px;">
                {{trans('order.display')}}
            </button>
            <div class="table">
                <table class="table table-striped table-bordered center">
                    <thead>
                        <tr>
                            <td>{{trans('order.region')}}</td>
                            <td>{{trans('order.province')}}</td>
                            <td>{{trans('order.city')}}</td>
                            <td>{{trans('order.shop_name')}}</td>
                            <td>{{trans('order.shop_user')}}</td>
                            <td>{{trans('order.user_phone')}}</td>
                            <td>{{trans('order.shop_address')}}</td>
                            <td>{{trans('order.independent_counter')}}</td>
                            <td>{{trans('order.luxury_section')}}</td>
                            <td>{{trans('order.counter_packing')}}</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->shop->city->region->name}}</td>
                            <td>{{$order->shop->city->province->name}}</td>
                            <td>{{$order->shop->city->name}}</td>
                            <td>{{$order->shop->name}}</td>
                            <td>{{$order->shop->user->name}}</td>
                            <td>{{$order->shop->user->phone}}</td>
                            <td>{{$order->shop->address}}</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="center">
        {!! $orders->appends(['select'=>isset($a)?json_encode($a):""])->render() !!}
    </div>
</div>
@stop