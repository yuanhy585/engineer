@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            工程部职员
        </div>
        <br/><hr/>
    </div>
    <div class="table col-md-6">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <td>员工姓名</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            @foreach($engineers as $engineer)
                <tr>
                    <td>{{$engineer->name}}</td>
                    <td>
                        <a class="btn btn-success" href="/engineer/{{$engineer->id}}/orderAssigned">
                            已分配订单
                        </a>
                        <a class="btn btn-primary" href="/engineer/{{$engineer->id}}/orderUnassigned">
                            未分配订单
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop