@extends('layout')
@section('js')
<script>
$("#assignedAllOrders").change(function () {
    if($(this).is(":checked")){
        $("input.assignedOrders:checkbox:not(:checked)").prop("checked",true);
    }else{
        $("input.assignedOrders:checkbox:checked").prop("checked",false);
    }
});
</script>
@append
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            已分配订单
        </div>
        <br/><hr/>
    </div>
    <div class="row">
        <form action="/user/{{$user_id}}/cancelAssignedOrder" method="post">
            {{csrf_field()}}
        <div class="table">
            <table class="table table-bordered table-striped text-center" style="margin-bottom: 100px;">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="assignedAllOrders" name="assignedAllOrders"
                        id="assignedAllOrders"/>
                    </th>
                    <th>订单序号</th>
                    <th>大区</th>
                    <th>省份</th>
                    <th>城市</th>
                    <th>店铺执行联系人</th>
                    <th>联系电话</th>
                    <th>店铺地址</th>
                </tr>
                </thead>
                @foreach($orders as $order)
                    <tbody>
                    <tr>
                        <td>
                            {{--注意该处的name应该是带[]符号的--}}
                            <input type="checkbox" name="assignedOrders[]" class="assignedOrders"
                                   value="{{$order->id}}" />
                        </td>
                        <td>{{$order->id}}</td>
                        <td>{{$order->shop->city->region->name}}</td>
                        <td>{{$order->shop->city->province->name}}</td>
                        <td>{{$order->shop->city->name}}</td>
                        <td>{{$order->shop->user->name}}</td>
                        <td>{{$order->shop->user->phone}}</td>
                        <td>{{$order->shop->address}}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="text-center" style="margin-top: 50px;">
            <button type="submit" class="btn btn-danger">
                移除订单
            </button>
        </div>
        </form>
    </div>
</div>
@stop