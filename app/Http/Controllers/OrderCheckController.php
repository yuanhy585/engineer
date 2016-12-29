<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use App\Province;
use App\Region;
use App\Status;
use Illuminate\Http\Request;

use Gate, Auth,Redirect;
use App\Http\Requests;

class OrderCheckController extends Controller
{
    public function index(Request $request)
    {
        if(Gate::denies('check_order',Auth::user()))
        {
            return Redirect::back();
        }
        $inputs = $request->has('select')?json_decode($request->input(['select']),true):$request->all();

        $orders = Order::where(function($query)use($inputs){
            if(isset($inputs['findByUserName'])){
                $query->where('name','LIKE','%'.$inputs['name'].'%');
            }
        })->paginate(10);
        $a=$inputs;

        $statuses = Status::all();
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $province_id = isset($inputs['province'])?$inputs['province']:1;
        $city_id = isset($inputs['city'])?$inputs['city']:169;

        return view('orderCheck.index',compact('orders','a','statuses','regions',
            'provinces','cities','province_id','city_id'));
    }


}
