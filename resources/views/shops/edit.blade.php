@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px">
            {{trans('shop.shop_edit')}}
        </div>
        <br/><hr/>
    </div>

    <div class="row">
        <form role="form" class="form-group" method="post" action="/shops/{{$shop->id}}/update">

            {{csrf_field()}}
            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.region')}}:
                <select id="region_id" name="region_id" class="form-control">
                    @foreach($regions as $id => $name)
                        <option @if($shop->city->region->name == $name) selected @endif
                        value="{{$id}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5"  style="margin-bottom: 15px;">
                {{trans('shop.province')}}:
                <select id="province_id" name="province_id" class="form-control">
                    @foreach($provinces as $id => $name)
                        <option @if($shop->city->province->name == $name) selected @endif
                        value="{{$id}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.city')}}:
                <select id="city_id" name="city_id" class="form-control">
                    @foreach($cities as $id => $name)
                        <option @if($shop->city_id == $id) selected @endif
                        value="{{$id}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.channel')}}:
                <select name="channel_id" class="form-control">
                    @foreach($channels as $id => $name)
                        <option @if($shop->channel_id == $id) selected @endif
                        value="{{$id}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.shop_level')}}:
                <select name="shop_level_id" class="form-control">
                    @foreach($shop_levels as $id => $name)
                        <option @if($shop->shop_level_id == $id) selected @endif
                        value="{{$id}}">
                            {{$name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.parent_shop')}}:
                <input type="text" name="parent_shop" class="form-control" value="{{$shop->parent_shop}}"/>
            </div>

            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.shop_code')}}:
                <input type="text" name="shop_code" class="form-control" value="{{$shop->shop_code}}"/>
            </div>
            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.shop_name')}}:
                <input type="text" name="shop_name" class="form-control" value="{{$shop->name}}"/>
            </div>

            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.contact')}}:
                <select name="phone" class="form-control">
                    @foreach($sellers as $name => $phone)
                        <option value="{{$shop->user->phone}}" value="{{$phone}}">
                            {{$name}} {{$phone}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5" style="margin-bottom: 15px;">
                {{trans('shop.shop_address')}}:
                <input type="text" name="shop_address" class="form-control" value="{{$shop->address}}"/>
            </div>

            <div class="col-md-5" style="margin-bottom: 15px;">
                <button type="submit" class="btn btn-md btn-primary" style="float:right;">
                    {{trans('shop.submit')}}
                </button>
            </div>
            <div class="col-md-5" style="margin-bottom: 15px;">
                <a class="btn btn-md btn-success" href="/shops">
                    {{trans('shop.cancel')}}
                </a>
            </div>

        </form>
    </div>
</div>
@stop