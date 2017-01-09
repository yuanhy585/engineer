@extends('layout')
@section('js')
    <script src="/js/linkage.js"></script>
@append
@section('content')
    <div class="container">
        <div class="row">

            <div class="page_title">
                <span style="font-size: 30px;">{{trans('shop.my_shop')}}</span>
                <span style="color:red;">
                    ( {{trans('shop.total_orders')}}:<span>0</span>&nbsp;&nbsp;
                    {{trans('shop.in_censoring')}}:<span>0</span>&nbsp;&nbsp;
                    {{trans('shop.passed')}}:<span>0</span>&nbsp;&nbsp;
                    {{trans('shop.failed')}}:<span>0</span> )
                </span>
            </div>
            <br/><hr/>
            <div class="form-group">
                <form class="form-inline" action="/myshop">

                    @include('shops.linkage')

                    {{--<input type="text" name="parentshop" class="form-control" placeholder="{{trans('shop.input_parent_shop')}}"/>--}}
                    {{--<input type="text" name="shopcode" class="form-control" placeholder="{{trans('shop.input_shop_code')}}"/>--}}
                    {{--<input type="text" name="shopname" class="form-control" placeholder="{{trans('shop.input_shop_name')}}"/>--}}

                    <div style="margin-top: 15px;">
                        {{--<input type="text" name="shopaddress" class="form-control" placeholder="{{trans('shop.input_shop_address')}}"/>--}}
                        <input type="text" name="findByShopName" class="form-control"
                               placeholder="{{trans('shop.input_shop_name')}}"
                               value="{{isset($a['findByShopName'])?$a['findByShopName']:""}}"/>
                        <button type="submit" class="btn btn-primary">{{trans('shop.search')}}</button>
                    </div>
                </form>
            </div>

            <div class="table">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                    <tr>
                        <td>{{trans('shop.region')}}</td>
                        <td>{{trans('shop.province')}}</td>
                        <td>{{trans('shop.shop_user')}}</td>
                        <td>{{trans('shop.city')}}</td>
                        <td>{{trans('shop.channel')}}</td>
                        <td>{{trans('shop.shop_level')}}</td>
                        <td>{{trans('shop.parent_shop')}}</td>
                        <td>{{trans('shop.shop_code')}}</td>
                        <td>{{trans('shop.shop_name')}}</td>
                        <td>{{trans('shop.contact')}}</td>
                        <td>{{trans('shop.shop_address')}}</td>
                        <td>{{trans('shop.edit')}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shops as $shop)
                        <tr>
                            <td>{{$shop->city->region->name}}</td>
                            <td>{{$shop->city->province->name}}</td>
                            <td>{{$shop->user->name}}</td>
                            <td>{{$shop->city->name}}</td>
                            <td>{{$shop->channel->name}}</td>
                            <td>{{$shop->shopLevel->name}}</td>
                            <td>{{$shop->parent_shop}}</td>
                            <td>{{$shop->shop_code}}</td>
                            <td>{{$shop->name}}</td>
                            <td>{{$shop->user->phone}}</td>
                            <td>{{$shop->address}}</td>
                            <td>
                                <a class="btn btn-success" href="/orders">
                                    {{trans('shop.check_order')}}
                                </a>
                                <a class="btn btn-primary" href="/orders/create">
                                    {{trans('shop.add_order')}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">
            {!! $shops->appends(['select'=>isset($a)?json_encode($a):""])->render()!!}
        </div>

    </div>
@endsection