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
			{{trans('order.add_material')}}
		</div>
		<hr/>
	</div>

	<div class="row">
		<form class="form-group" role="form" method="post" action="">

			{{csrf_field()}}

			<div class="row">
				<div class="col-md-5">
					{{trans('order.material_type')}}:
					<input type="text" name="type" class="form-control" />
				</div>

				<div class="col-md-5">
					{{trans('order.material_name')}}:
					<input type="text" name="name" class="form-control" />
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5"  style="margin-top:10px;">
					<div>
						{{trans('order.position')}}:
						<input type="text" name="position" class="form-control" />
					</div>

					<div>
						{{trans('order.area_size1')}}:
						<input type="text" name="width" placeholder="{{trans('order.requirement1')}}" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5" style="margin-top:10px;">
					{{trans('order.remark')}}:
					<textarea  class="form-control" cols="10" rows="10" name="remark"> </textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					{{trans('order.area_size2')}}:
						<input type="text" name="height" placeholder="{{trans('order.requirement1')}}" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					{{trans('order.numberInput')}}:
						<input type="text" name="number" placeholder="{{trans('order.requirement2')}}" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					{{trans('order.total_area')}}:
						<input type="text" name="area" placeholder="{{trans('order.auto_calculation')}}" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 col-md-offset-2">
					<button type="submit" class="btn btn-md btn-primary" style="float:right;">
						{{trans('order.add_material')}}
					</button>
				</div>
				<div class="col-md-3">
					<a  class="btn btn-md btn-warning" href="">
						{{trans('order.return')}}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@stop