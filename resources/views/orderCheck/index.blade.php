@extends('layout')
@section('js')
<script src="/js/linkage.js"></script>
@append
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('user.order_check')}}
        </div>
        <br/><hr/>
    </div>
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="">{{trans('order.not_contact_seller')}}</a>
                    <span class="badge">{{$number1}}</span>
                </li>
                <li class="list-group-item">
                    <a href="">{{trans('order.waiting_feedback')}}</a>
                    <span class="badge">{{$number2}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.seller_confirmed')}}</a>
                    <span class="badge">{{$number3}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.measure')}}</a>
                    <span class="badge">{{$number4}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.picture/offer')}}</a>
                    <span class="badge">{{$number5}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.seller_confirm_picEffect')}}</a>
                    <span class="badge">{{$number6}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.in_making')}}</a>
                    <span class="badge">{{$number7}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.set_up')}}</a>
                    <span class="badge">{{$number8}}</span>
                </li><li class="list-group-item">
                    <a href="">{{trans('order.finished')}}</a>
                    <span class="badge">{{$number9}}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-10" style="margin-top:10px;">
            <form class="form-inline" action="/order_check" role="form">
                @include('shops.linkage')
                <div class="search" style="margin-top:10px;">
                    <input type="text" class="form-control" name="findByUserName"
                           placeholder="{{trans('order.input_shop_user')}}"
                           value="{{isset($a['findByUserName'])?$a['findByUserName']:""}}"/>
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
                            <td>收银台（个）</td>
                            <td>橱窗（个）</td>
                            <td>包柱（个）</td>
                            <td>遮阳卷帘（个）</td>
                            <td>其他（个）</td>
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
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->where('material_id',1)->pluck('material_id')))}}
                            </td>
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->where('material_id',2)->pluck('material_id')))}}
                            </td>
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->where('material_id',3)->pluck('material_id')))}}
                            </td>
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->whereIn('material_id',[4,5])->pluck('material_id')))}}
                            </td>
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->whereIn('material_id',[6,7])->pluck('material_id')))}}
                            </td>
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->where('material_id',8)->pluck('material_id')))}}
                            </td>
                            <td>
                                {{count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->whereIn('material_id',[9,10])->pluck('material_id')))}}
                            </td>
                            <td>
                                {{ count(\App\Material::where('id',\App\MaterialOrder::where('order_id',$order->id)
                                ->whereIn('material_id',[11,12,13,14,15])->pluck('material_id')))}}
                            </td>
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