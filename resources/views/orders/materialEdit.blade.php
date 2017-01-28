@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('order.material_order_update')}}
        </div>
        <br/><hr/>
    </div>
    <div class="row">

        <form action="/materialOrder/{{$material_order->id}}/update" method="post">

            {{csrf_field()}}

            <div  class="col-md-5" style="margin-bottom: 10px;">
                {{trans('order.material_type')}}:
                <select class="form-control" name="type" style="margin-bottom: 10px;">
                    @foreach($material_types as $type)
                        <option @if($material_order->material->type == $type) selected @endif
                                value="{{$type}}">{{$type}}</option>
                    @endforeach
                </select>

                {{trans('order.position')}}:
                <input type="text" name="position" class="form-control" style="margin-bottom: 10px;"
                       value="{{$material_order->position}}" />

                {{trans('order.area_size2')}}
                <input type="text" name="height" class="form-control" style="margin-bottom: 10px;"
                       value="{{$material_order->height}}" />

                {{trans('order.numberInput')}}
                <input type="text" name="number" class="form-control" style="margin-bottom: 10px;"
                       value="{{$material_order->number}}" />

                {{trans('order.total_area')}}
                <input type="text" name="area" class="form-control" id="area" style="margin-bottom: 10px;"
                       value="{{$material_order->area}}" />
            </div>

            <div  class="col-md-5">
                {{trans('order.material_name')}}:
                <select class="form-control" name="name" style="margin-bottom: 10px;">
                    @foreach($material_names as $name)
                        <option @if($material_order->material->name == $name) selected @endif
                        value="{{$name}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>

                {{trans('order.area_size1')}}
                <input type="text" name="width" class="form-control" style="margin-bottom: 10px;"
                       value="{{$material_order->width}}" />

                {{trans('order.remark')}}:
                <textarea cols="10" rows="5" name="remark" class="form-control" style="margin-bottom: 10px;">
                    {{$material_order->remark}}
                </textarea>
            </div>

            <div class="col-md-10" style="margin-top: 20px;">
                <div class="col-md-3 col-md-offset-4">
                    <button type="submit" class="btn btn-success">
                        {{trans('order.confirm')}}
                    </button>
                </div>
                <div class="col-md-3">
                    <a  class="btn btn-danger" href="/orders/{{$material_order->order_id}}/material_index">
                        {{trans('order.cancel')}}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@stop