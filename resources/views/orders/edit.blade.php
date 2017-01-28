@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="page-title" style="font-size:30px;">
                {{trans('order.order_update')}}
            </div>
            <br/><hr/>
        </div>
        <div class="form">
            <form role="form" method="post" action="/orders/{{$order->id}}/update">

                {{csrf_field()}}
                <div class="row">
                    {{--<div class="col-md-5">--}}
                        {{--{{trans('order.shop_user')}}:--}}
                        {{--<select class="form-control" name="phone">--}}
                            {{--//这一部分需要检查，因为只有一个销售，不知道代码是不是能实现--}}
                            {{--@foreach($sellers as $name => $phone)--}}
                                {{--<option value="{{$order->shop->user->name}}"--}}
                                        {{--value="{{$order->shop->user->phone}}" selected>--}}
                                     {{--{{$name}} {{$phone}}--}}
                                {{--</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<br/>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-5">--}}
                        {{--{{trans('order.shop_address')}}:--}}
                        {{--<input type="text" name="address" class="form-control"--}}
                               {{--value="{{$order->shop->address}}"/>--}}
                        {{--<br/>--}}
                    {{--</div>--}}

                    <div class="col-md-7">
                        {{trans('order.theme_activity')}}
                        <input type="text" name="theme" class="form-control"
                               value="{{$order->theme}}"/>
                        <br/>
                    </div>

                    <div class="col-md-7">
                        {{trans('order.remark')}}
                        <textarea cols="10" rows="5" name="remark" class="form-control">
                        {{$order->remark}}
                    </textarea>
                        <br/>
                    </div>

                    <div class="col-md-7">
                        {{trans('order.need_measure')}}:
                        @if($order->needMeasure == 1)
                            {{trans('order.yes')}}
                            <input type="radio" name="measure"
                                   value="1" checked/>
                            {{trans('order.no')}}
                            <input type="radio" name="measure"
                                   value="0"/>
                        @elseif($order->needMeasure == 0)
                            {{trans('order.yes')}}
                            <input type="radio" name="measure"
                                   value="1" />
                            {{trans('order.no')}}
                            <input type="radio" name="measure"
                                   value="0" checked/>
                        @endif

                        <br/><br/>
                    </div>

                    <div class="col-md-7">
                        {{trans('order.need_install')}}:
                        @if($order->needInstall == 1)
                            {{trans('order.yes')}}
                            <input type="radio" name="install"
                                   value="1" checked/>
                            {{trans('order.no')}}
                            <input type="radio" name="install"
                                   value="0" />
                        @elseif($order->needInstall == 0)
                            {{trans('order.yes')}}
                            <input type="radio" name="install"
                                   value="1"/>
                            {{trans('order.no')}}
                            <input type="radio" name="install"
                                   value="0" checked/>
                        @endif
                        <br/><br/><br/>
                    </div>

                </div>

                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-success">
                        {{trans('order.confirm')}}
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-warning" href="/shops/{{$order->shop_id}}/orders">
                        {{trans('order.cancel')}}
                    </a>
                </div>

            </form>
        </div>

    </div>

@stop