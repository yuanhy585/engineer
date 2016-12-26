@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('material.price_management')}}
        </div>
        <br/><hr/>
        <div>
            <a class="btn btn-primary" href="/materials/create">
                {{trans('material.material_create')}}
            </a>
        </div>
        <br/>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <td>{{trans('material.special')}}</td>
                        <td>{{trans('material.category')}}</td>
                        <td>{{trans('material.type')}}</td>
                        <td>{{trans('material.name')}}</td>
                        <td>{{trans('material.price')}}</td>
{{--                        <td>{{trans('material.visible')}}</td>--}}
                        <td>{{trans('material.update_delete')}}</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($materials as $material)
                    <tr>
                        <td>
                            <a href="/materials/{{$material->id}}">{{$material->special}}</a>
                        </td>
                        <td>{{$material->category}}</td>
                        <td>{{$material->type}}</td>
                        <td>{{$material->name}}</td>
                        <td>{{$material->price}}</td>
{{--                        <td>{{$material->visible}}</td>--}}
                        <td>
                            <a class="btn btn-primary" href="/materials/{{$material->id}}/edit">{{trans('material.update')}}</a>
                            <a class="btn btn-danger" href="/materials/{{$material->id}}/delete">{{trans('material.delete')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@stop