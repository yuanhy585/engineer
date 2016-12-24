@extends('layout')
@section('content')
<div class="container">
    <div class="row">

        <div class="page_title" style="font-size: 30px;">
            {{trans('shop.shop_management')}}
        </div>
        <br/><hr/>
        <div style="float:left">
            <a class="btn btn-primary" href="/shops/create">
                {{trans('shop.shop_create')}}
            </a>
        </div>
        <br/><br/>
        <div class="form-group">
            <form class="form-inline">
                <select name="region" class="form-control">
                    @foreach($regions as $id => $name)
                        <option>{{$name}}</option>
                    @endforeach
                </select>
                <select name="province" class="form-control">
                    @foreach($provinces as $id => $name)
                        <option>{{$name}}</option>
                    @endforeach
                </select>
                <select name="city" class="form-control">
                    @foreach($cities as $id => $name)
                        <option>{{$name}}</option>
                    @endforeach
                </select>
                {{--<input type="text" name="parentshop" class="form-control" placeholder="{{trans('shop.input_parent_shop')}}"/>--}}
                {{--<input type="text" name="shopcode" class="form-control" placeholder="{{trans('shop.input_shop_code')}}"/>--}}
                {{--<input type="text" name="shopname" class="form-control" placeholder="{{trans('shop.input_shop_name')}}"/>--}}
                {{--<input type="text" name="shopaddress" class="form-control" placeholder="{{trans('shop.input_shop_address')}}"/>--}}

                <div class="search" style="margin-top: 15px;">
                    <input type="text" name="findByShopUser" class="form-control"
                           placeholder="{{trans('shop.input_shop_user')}}"
                           value="{{isset($a['findByShopUser'])?$a['findByShopUser']:""}}"/>
                    <button type="submit" class="btn btn-primary">{{trans('shop.search')}}</button>
                </div>
            </form>
        </div>

        <div class="table">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
{{--                        <td>{{trans('shop.region')}}</td>--}}
{{--                        <td>{{trans('shop.province')}}</td>--}}
                        <td>{{trans('shop.city')}}</td>
                        <td>{{trans('shop.channel')}}</td>
                        <td>{{trans('shop.shop_level')}}</td>
                        <td>{{trans('shop.parent_shop')}}</td>
                        <td>{{trans('shop.shop_code')}}</td>
                        <td>{{trans('shop.shop_name')}}</td>
                        <td>{{trans('shop.shop_user')}}</td>
{{--                        <td>{{trans('shop.contact_number')}}</td>--}}
                        <td>{{trans('shop.shop_address')}}</td>
                        <td>{{trans('shop.edit')}}</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                    <tr>
{{--                        <td>{{$shop->region->id}}</td>--}}
{{--                        <td>{{$shop->province->id}}</td>--}}
                        <td>{{$shop->city->name}}</td>
                        <td>{{$shop->channel->name}}</td>
                        <td>{{$shop->shop_level->name}}</td>
                        <td>{{$shop->parent_shop}}</td>
                        <td>{{$shop->shop_code}}</td>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->user_id}}</td>
                        {{--<td>111222</td> --}}
                        <td>{{$shop->address}}</td>
                        <td><a class="btn btn-primary" href="">{{trans('shop.shop_update')}}</a></td>
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
@stop