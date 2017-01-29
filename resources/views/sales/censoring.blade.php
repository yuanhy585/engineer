@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size:30px;">
            {{trans('sale.orders_check_and_censor')}}
        </div>
        <br/><hr/>
    </div>
    <div class="row">
        <form class="form-inline" action="" role="form">
             @include('shops.linkage')
            <div class="search">
                <input type="text" name="findByUserName" class="form-control"
                placeholder="{{trans('sale.input_shop_user')}}" style="margin:10px 0;"
                value=""/>
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
                <td>DM审核状态</td>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@stop