<?php

namespace App\Http\Controllers;

use App\Channel;
use App\City;
use App\Province;
use App\Region;
use App\Shop;
use App\ShopLevel;
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
        $a = $inputs;

        $shops = Shop::where(function($query)use($inputs){
            if (isset($inputs['findByShopUser'])) {
                $query->where('name','LIKE','%',$inputs['findByShopUser'].'%');
            }
        })->paginate(5);

        return view('shops.index',compact('shops','a'));
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
//        $contact_numbers =
        return view('shops.create',compact('regions','provinces','cities','channels','shop_levels'));
    }


}
