<?php

namespace App\Http\Controllers;

use App\Channel;
use App\City;
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
                $query->where('name','LIKE','%',$inputs['findByShopUser'].'%');
            }
        })->paginate(10);

        $a = $inputs;
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');

        return view('shops.index',compact('shops','a','provinces','regions','cities'));
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
        $province_id = 1;
        $city_id = 169;


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








    public function ajxProvince(Request $request)
    {
        $inputs = $request->all();
        $cities = City::where('province_id', $inputs['province_id'])->get();

        return $cities;
    }

}
