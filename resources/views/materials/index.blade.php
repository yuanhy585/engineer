@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('material.price_management')}}
        </div>
        <br/><hr/>
        <div>
            <a class="btn btn-primary" href="/material/create">{{trans('material.material_create')}}</a>
        </div>
        <br/>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <tr>
                    <td>{{trans('material.special')}}</td>
                    <td>{{trans('material.category')}}</td>
                    <td>{{trans('material.type')}}</td>
                    <td>{{trans('material.name')}}</td>
                    <td>{{trans('material.price')}}</td>
                    <td>{{trans('material.visible')}}</td>
                    <td>{{trans('material.update_delete')}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@stop