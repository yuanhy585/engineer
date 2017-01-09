@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="page-title" style="font-size:30px;">
			{{trans('order.order_show')}}
		</div>
		<br/><hr/>
	</div>
	<div class="row">
		<div class="table" style="margin-top:20px;">
			<table class="table table-bordered table-striped text-center">
				<thead>
					<tr>
						<td>{{trans('order.region')}}</td>
						<td>{{trans('order.province')}}</td>
						<td>{{trans('order.city')}}</td>
						<td>{{trans('order.channel')}}</td>
						<td>{{trans('order.shop_level')}}</td>
						<td>{{trans('order.parent_shop')}}</td>
						<td>{{trans('order.order_id')}}</td>
						<td>{{trans('order.order_code')}}</td>
						<td>{{trans('order.shop_code')}}</td>
						<td>{{trans('order.shop_name')}}</td>
						<td>{{trans('order.shop_user')}}</td>
						<td>{{trans('order.phone')}}</td>
						<td>{{trans('order.shop_address')}}</td>
						<td>{{trans('order.theme_activity')}}</td>
						<td>{{trans('order.remark')}}</td>
						<td>{{trans('order.need_measure')}}</td>
						<td>{{trans('order.need_install')}}</td>
						<td>{{trans('order.edit')}}</td>
					</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr>
						<td>{{$order->shop->city->region->name}}</td>
						<td>{{$order->shop->city->province->name}}</td>
						<td>{{$order->shop->city->name}}</td>
						<td>{{$order->shop->channel->name}}</td>
						<td>{{$order->shop->shopLevel->name}}</td>
						<td>{{$order->shop->parent_shop}}</td>
						<td>{{$order->order_id}}</td>
						<td>{{$order->orderCode}}</td>
						<td>{{$order->shop->shop_code}}</td>
						<td>{{$order->shop->name}}</td>
						<td>{{$order->shop->user->name}}</td>
						<td>{{$order->shop->user->phone}}</td>
						<td>{{$order->shop->address}}</td>
						<td>{{$order->theme}}</td>
						<td>{{$order->remark}}</td>
						<td>{{$order->needMeasure}}</td>
						<td>{{$order->needInstall}}</td>
						<td>
							<a class="btn btn-warning" href="">
								{{trans('order.order_update')}}
							</a>
							<a class="btn btn-info" href="">
								{{trans('order.material_manage')}}
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<div class="text-center">
				<button class="btn btn-primary">
					{{trans('order.order_submit')}}
				</button>	
			</div>
		</div>
	</div>
</div>

@stop