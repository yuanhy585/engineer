<?php

namespace App\Http\Controllers;

use App\Channel;
use App\City;
use App\Order;
use App\Province;
use App\Region;
use App\Shop;
use App\ShopLevel;
use App\User;
use Gate, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if(Gate::denies('manage_shop',Auth::user()))
        {
            return Redirect::back();
        }

        $inputs = $request->has('select')?json_decode($request->input(['select']),true):$request->all();

        $shops = Shop::where(function($query)use($inputs){
            if (isset($inputs['findByShopUser'])) {
                $query->where('name','LIKE','%'.$inputs['findByShopUser'].'%');
            }
        })
        ->orwhereHas('user',function ($query) use ($inputs)
        {
            if (isset($inputs['findByShopUser'])) {
                $query->where('name','LIKE','%'.$inputs['findByShopUser'].'%');
            }
        })
        ->paginate(10);

        $a = $inputs;
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');

        $province_id = isset($inputs['province'])?$inputs['province']:1;
        $city_id = isset($inputs['city'])?$inputs['city']:169;

        return view('shops.index',compact('shops','a','provinces','regions','cities',
            'province_id','city_id'));
    }


    public function create()
    {
        if(Gate::denies('manage_shop',Auth::user()))
        {
            return Redirect::back();
        }
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $channels = Channel::all()->pluck('name','id');
        $shop_levels = ShopLevel::all()->pluck('name','id');
        $sellers = User::where('department_id',1)->pluck('phone','name');
        $province_id = isset($inputs['province'])?$inputs['province']:1;
        $city_id = isset($inputs['city'])?$inputs['city']:169;

        return view('shops.create',compact('regions','provinces','cities','channels',
            'shop_levels','sellers','province_id','city_id'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage_shop',Auth::user()))
        {
            return Redirect::back();
        }

        $inputs = $request->all();

        $shop = new Shop();
//        $shop->region_id = $inputs['region_id'];
        $shop->user_id = User::where('phone',$inputs['phone'])->first()->id;
        $shop->city_id = $inputs['city_id'];
        $shop->channel_id = $inputs['channel_id'];
        $shop->shop_level_id = $inputs['shop_level_id'];
        $shop->parent_shop = isset($inputs['parent_shop'])?$inputs['parent_shop']:null;
        $shop->shop_code = isset($inputs['shop_code'])?$inputs['shop_code']:null;
        $shop->name = $inputs['shop_name'];
        $shop->address = isset($inputs['shop_address'])?$inputs['shop_address']:null;

        $shop->save();
        return redirect('/shops');
    }


    public function edit($id)
    {
        if (Gate::denies('manage_shop',Auth::user()))
        {
            return Redirect::back();
        }
        $shop = Shop::where('id',$id)->first();
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $channels = Channel::all()->pluck('name','id');
        $shop_levels = ShopLevel::all()->pluck('name','id');
        $sellers = User::where('department_id',1)->pluck('phone','name');

        return view('shops.edit',compact('shop','regions','provinces','cities','channels',
            'shop_levels','sellers','province_id','city_id'));

    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('manage_shop',Auth::user()))
        {
            return Redirect::back();
        }
        $shop = Shop::where('id',$id)->first();
        $inputs = $request->all();
        //dd($inputs);
        $shop->user_id = User::where('phone',$inputs['phone'])->first()->id;
        $shop->city_id = $inputs['city_id'];
        $shop->channel_id = $inputs['channel_id'];
        $shop->shop_level_id = $inputs['shop_level_id'];
        if (isset($inputs['parent_shop']))
        {
            $shop->parent_shop = $inputs['parent_shop'];
        }
        if (isset($inputs['shop_code']))
        {
            $shop->shop_code = $inputs['shop_code'];
        }

        $shop->name = $inputs['shop_name'];

        if (isset($inputs['shop_address']))
        {
            $shop->address = $inputs['shop_address'];
        }

        $shop->save();
        return redirect('/shops');

    }

    public function myShop(Request $request)
    {
        if (Gate::denies('manage_myShop',Auth::user()))
        {
            return back();
        }
        $inputs = $request->has('select')?json_decode($request->input(['select']),true):$request->all();

        $shops = Shop::where(function($query)use($inputs){
            if (isset($inputs['findByShopName'])) {
                $query->where('name','LIKE','%'.$inputs['findByShopName'].'%');
            }
        })
            ->where('user_id',Auth::user()->id) //UserPolicy中定义的方法只定义谁有操作权限，不能过滤
            ->paginate(10);
        $a = $inputs;
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $province_id = isset($inputs['province'])?$inputs['province']:1;
        $city_id = isset($inputs['city'])?$inputs['city']:169;
        //销售部门能见的订单审核情况以市场部的active2为判断标准，1-待审核，2-审核通过，3-审核未通过
        $total_order = Order::whereIn('shop_id',Shop::where('user_id',Auth::user()->id)->pluck('id'))->count();
        $number1 = Order::whereIn('shop_id',Shop::where('user_id',Auth::user()->id)->pluck('id'))->where('active2',1)->count();
        $number2 = Order::whereIn('shop_id',Shop::where('user_id',Auth::user()->id)->pluck('id'))->where('active2',2)->count();
        $number3 = Order::whereIn('shop_id',Shop::where('user_id',Auth::user()->id)->pluck('id'))->where('active2',3)->count();
        return view('shops.myShop',compact('a','shops','regions','provinces','cities',
            'province_id','city_id','total_order','number1','number2','number3'));
    }


    public function ajxPC(Request $request)
    {
        $inputs = $request->all();
        $cities = City::where('province_id',$inputs['province_id'])->get();
        return $cities;
    }

}
