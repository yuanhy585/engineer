@extends('layout')
@section('js')
<script>
    $("#assignAllOrders").change(function(){
        if($(this).is(":checked")){
            $("input.assignOrders:checkbox:not(:checked)").prop('checked',true);
        }else{
            $("input.assignOrders:checkbox:checked").prop('checked',false);
        }
    });
</script>
@append
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size:30px;">
            待分配订单
        </div>
        <br/><hr/>
    </div>
    <div class="row">
        <form action="/engineer/{{$user_id}}/assignedOrderStore" method="post">
            {{csrf_field()}}
            <div class="table">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="assignAllOrders" id="assignAllOrders"/>
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
                                <input type="checkbox" name="assignOrders[]" class="assignOrders"
                                       value="{{$order->id}}" />
                                {{--<input type="hidden" name="user_id" value="{{$user_id}}" />--}}
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
            <button type="submit" class="btn btn-primary">
                分配订单
            </button>
        </div>
        </form>
    </div>
</div>
@stop