@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="page-title" style="font-size: 30px;">
		<p>
			{{trans('order.orderId')}}:
		</p>
		</div>
		<br/><hr/>
	</div>

	<div class="row">
		<div class="page-title" style="font-size: 20px; padding-bottom: 10px;">
			{{trans('order.sales_material_manage')}}
		</div>
		<hr/>
	</div>

	<a class="btn btn-primary" href="">{{trans('order.add_material')}}</a>

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
				<tr>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
					<td>{{}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary">{{trans('order.submit_materialInfo')}}</button>
	</div>
</div>
@stop