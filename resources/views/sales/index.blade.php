@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('sale.sellers')}}
        </div>
        <br/><hr/>
    </div>
    <a class="btn btn-primary" href="/user/sale/create">
        {{trans('sale.seller_create')}}
    </a>
    <div class="table" style="margin-top: 20px;">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <td>{{trans('sale.seller_name')}}</td>
                    <td>{{trans('sale.phone')}}</td>
                    <td>{{trans('sale.department')}}</td>
                    <td>{{trans('sale.province')}}</td>
                    <td>{{trans('sale.city')}}</td>
                    <td>{{trans('sale.edit')}}</td>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->department->title}}</td>
                    <td>{{$user->city->province->name}}</td>
                    <td>{{$user->city->name}}</td>
                    <td>
                        <a href="/user/sale/{{$user->id}}/edit" class="btn btn-primary">
                            {{trans('sale.update')}}
                        </a>
                        <a href="/user/sale/{{$user->id}}/delete" class="btn btn-danger">
                            {{trans('sale.delete')}}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop