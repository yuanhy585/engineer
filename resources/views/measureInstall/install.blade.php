@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="page-title" style="font-size: 30px;">
                安装相关订单
            </div>
            <br/><hr/>
        </div>
        <div class="table">
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>大区</th>
                    <th>省份</th>
                    <th>城市</th>
                    <th>订单号</th>
                    <th>上传照片</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->shop->city->region->name}}</td>
                        <td>{{$order->shop->city->province->name}}</td>
                        <td>{{$order->shop->city->name}}</td>
                        <td>{{$order->order_id}}</td>
                        <td>
                            <button class="btn btn-primary">上传照片</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection