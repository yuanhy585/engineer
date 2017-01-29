@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="page-title" style="font-size: 30px; text-align: center;">
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
			{{trans('order.sales_material_manage')}}
		</div>
		<hr/>
	</div>

	<div>
		<a class="btn btn-primary" href="/orders/{{$order->id}}/material_add">
			{{trans('order.add_material')}}
		</a>
		<br/><br/>
	</div>

	<div class="table">
		<table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<td>{{trans('order.material_type')}}</td>
					<td>{{trans('order.material_name')}}</td>
					<td>{{trans('order.position')}}</td>
					<td>{{trans('order.width')}}</td>
					<td>{{trans('order.height')}}</td>
					<td>{{trans('order.area')}}</td>
					<td>{{trans('order.number')}}</td>
					<td>{{trans('order.remark')}}</td>
					<td>{{trans('order.edit')}}</td>
				</tr>
			</thead>
			<tbody>
			@foreach($material_orders as $material_order)
				<tr>
					<td>{{\App\Material::where('id',$material_order->material_id)->first()->type}}</td>
					<td>{{$material_order->material->name}}</td>
					<td>{{$material_order->position}}</td>
					<td>{{$material_order->width}}</td>
					<td>{{$material_order->height}}</td>
					<td>{{$material_order->area}}</td>
					<td>{{$material_order->number}}</td>
					<td>{{$material_order->remark}}</td>
					<td>
						<a class="btn btn-primary" href="/material_order/{{$material_order->id}}/edit">
							{{trans('order.update')}}
						</a>
						<a class="btn btn-danger" href="/material_order/{{$material_order->id}}/delete">
							{{trans('order.delete')}}
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary">
			{{trans('order.submit_info')}}
		</button>
	</div>
</div>
@stop