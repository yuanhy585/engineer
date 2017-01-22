@extends('layout')
@section('content')
<div class="container">
    <div class="page-title" style="font-size: 30px;">
        {{trans('management.my_sale')}}
    </div>
    <br/><hr/>
    <div class="table">
        <table class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <td>{{trans('management.name')}}</td>
                <td>{{trans('management.phone')}}</td>
                <td>{{trans('management.department')}}</td>
                <td>{{trans('management.province')}}</td>
                <td>{{trans('management.city')}}</td>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop