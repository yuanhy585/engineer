@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="page-title" style="font-size: 30px;">

		</div>
		<br/><hr/>
	</div>

	<div class="row">
		<div class="page-title" style="font-size: 20px; padding-bottom: 10px;">
			{{trans('order.order_create')}}
		</div>
		<hr/>
	</div>

	<div class="row">
		{{--<form class="form-group" role="form" method="post" action="">//这个地方你的action都没有写要把数据提交到哪里，当然不会保存，傻逼--}}
		<form class="form-group" role="form" method="post" action="/orders/{{ $id }}/store">{{--又要传参数$id了--}}

			{{csrf_field()}}

			<input type="hidden" name="order_id" value="{{ substr( time(), 4). mt_rand( 10000, 99999 ) }}" />
			<input type="hidden" name="shop_id" value="{{$id}}" />

			<div class="row">
				<div class="col-md-5">
					{{trans('order.order_code')}}:
					<input type="text" name="orderCode" class="form-control" />
				</div>

				<div class="col-md-5">
					{{trans('order.theme_activity')}}:
					<input type="text" name="theme" class="form-control" />
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5"  style="margin-top:40px;">
					<div>
						{{trans('order.need_measure')}}:
						<br/><br/>
						{{--<input type="radio" name="needMeasure" value="need" />{{trans('order.yes')}}--}}
						<input type="radio" name="needMeasure" value="1" />{{trans('order.yes')}}
						{{--needMeasure以及下面的needInstall字段在数据库里都是boolean类型，value能为need或者not_need吗？？？？--}}
						&nbsp;&nbsp;
						{{--<input type="radio" name="needMeasure" value="not_need" />{{trans('order.no')}}--}}
						<input type="radio" name="needMeasure" value="0" checked />{{trans('order.no')}}
					</div><br/>

					<div>
						{{trans('order.need_install')}}:
						<br/><br/>
						{{--<input type="radio" name="needInstall" value="need" />{{trans('order.yes')}}--}}
						<input type="radio" name="needInstall" value="1" />{{trans('order.yes')}}
						&nbsp;&nbsp;
						{{--<input type="radio" name="needInstall" value="not_need" />{{trans('order.no')}}--}}
						<input type="radio" name="needInstall" value="0" checked />{{trans('order.no')}}
					</div>
				</div>
				

				<div class="col-md-5" style="margin-top:30px;">
					{{trans('order.remark')}}:
					<textarea  class="form-control" cols="10" rows="10" name="remark"> </textarea>
				</div>
			</div>
			<br/>

			<div class="row">
				<div class="col-md-3 col-md-offset-2">
					<button type="submit" class="btn btn-md btn-primary" style="float:right;">
						{{trans('order.order_create')}}
					</button>
				</div>
				<div class="col-md-3">
					{{--<a  class="btn btn-md btn-warning" href="/orders">//你写的--}}
					<a  class="btn btn-md btn-warning" href="/shops/{{ $id }}/orders">
						{{trans('order.return')}}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@stop