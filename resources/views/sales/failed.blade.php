@extends('layout')
@section('js')
    <script src="/js/linkage.js"></script>
@append
@section('content')
    <div class="container">
        <div class="row">
            <div class="page-title" style="font-size:30px;">
                审核未通过订单
            </div>
            <br/><hr/>
        </div>
        <div class="row">
            <form class="form-inline" action="" role="form">
                @include('shops.linkage')
                <div class="search">
                    <input type="text" name="findByUserName" class="form-control"
                           placeholder="{{trans('sale.input_shop_user')}}" style="margin:10px 0;"
                           value="{{isset($a['findByUserName'])?$a['findByUserName']:null}}"/>
                    <button type="submit" class="btn btn-primary">
                        {{trans('sale.search')}}
                    </button>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <td>大区</td>
                    <td>省份</td>
                    <td>城市</td>
                    <td>店铺名称</td>
                    <td>店铺执行联系人</td>
                    <td>联系人电话</td>
                    <td>门店地址</td>
                    <td>独立专柜（个）</td>
                    <td>豪华专区（个）</td>
                    <td>柜台包装（个）</td>
                    <td>收银台（个）</td>
                    <td>橱窗（个）</td>
                    <td>包柱（个）</td>
                    <td>遮阳卷帘（个）</td>
                    <td>其他（个）</td>
                    <td>预估总金额</td>
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
                        <td>{{$order->shop->Address}}</td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->where('material_id',1)->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->where('material_id',2)->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->where('material_id',3)->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->whereIn('material_id',[4,5])->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->whereIn('material_id',[6,7])->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->where('material_id',8)->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->whereIn('material_id',[9,10])->get())}}
                        </td>
                        <td>
                            {{count(\App\MaterialOrder::where('order_id',$order->id)->whereIn('material_id',[11,12,13,14,15])->get())}}
                        </td>
                        <td>{{$order->expectPrice}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination text-center">
            {!! $users->appends(['select'=>isset($a)?json_encode($a):""])->render() !!}
        </div>
    </div>
@stop