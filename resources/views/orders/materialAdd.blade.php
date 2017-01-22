@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="page-title" style="font-size: 30px;text-align: center;">
			{{$order->shop->name}}
			<br/>
			<h4>
				{{trans('order.orderId')}}:{{$order->order_id}}
			</h4>
		</div>
		<br/><hr/>
	</div>

	<div class="row">
		<div class="page-title" style="font-size: 20px; padding-bottom: 10px;">
			{{trans('order.add_material')}}
		</div>
		<hr/>
	</div>

	<div class="row">
		<form class="form-group" role="form" method="post"
			  action="/orders/{{$order->id}}/material_store">

			{{csrf_field()}}

{{--			{{$materialOrder->material->id}}--}}
			<input type="hidden" name="material_id"
				   value="3"/>
			{{--下面这个到底是第几个订单还是订单号？？order_id != $order->id.我用的是order->id--}}
			<input type="hidden" name="order_id" value="{{$order->id}}" />

			<div class="row">
				<div class="col-md-5">
					{{trans('order.material_type')}}:
					<select name="type" class="form-control">
						@foreach($material_types as $id=>$material_type)
							<option value="{{$id}}">{{$material_type}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-5">
					{{trans('order.material_name')}}:
					<select name="name" class="form-control">
						@foreach($material_names as $id=>$name)
							<option value="{{$id}}">{{$name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5" style="margin-top:10px;">
					{{trans('order.position')}}:
					<input type="text" name="position" class="form-control" />
				</div>

				<div class="col-md-5" style="margin-top:10px;">
					{{trans('order.area_size1')}}
					<input type="text" name="width"  class="form-control"
						   placeholder="{{trans('order.requirement1')}}" />
{{--					{!! errors_for('width',$errors) !!}--}}
				</div>
			</div>

			<div class="row">
				<div class="row col-md-5" style="margin-top:10px;margin-left: 1px;">
					<div>
						{{trans('order.area_size2')}}
						<input type="text" name="height"  class="form-control"
							   placeholder="{{trans('order.requirement1')}}" />
{{--						{!! errors_for('height',$errors) !!}--}}
					</div>

					<div style="margin-top:20px;">
						{{trans('order.numberInput')}}
						<input type="text" name="number"  class="form-control"
							   placeholder="{{trans('order.requirement2')}}" />
{{--						{!! errors_for('number',$errors) !!}--}}
					</div>
				</div>

				<div class="row col-md-5" style="margin-top:10px;margin-left: 15px;">
					<div>
						{{trans('order.remark')}}:
						<textarea class="form-control" cols="10" rows="5" name="remark"></textarea>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-5" style="margin-top:10px;">
					{{trans('order.total_area')}}
						<input type="text" name="area"  class="form-control"
							   placeholder="{{trans('order.auto_calculation')}}" />
				</div>
			</div>

			<div class="row" style="margin-top:20px;">
				<div class="col-md-3 col-md-offset-2">
					<button type="submit" class="btn btn-md btn-primary" style="float:right;">
						{{trans('order.add_material')}}
					</button>
				</div>
				<div class="col-md-3">
					<a  class="btn btn-md btn-warning"
						href="/orders/{{$order->id}}/material_index">
						{{trans('order.return')}}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@stop