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
        $number1 = Order::where('status_id',1)->count();
        $number2 = Order::where('status_id',2)->count();
        $number3 = Order::where('status_id',3)->count();
        $number4 = Order::where('status_id',4)->count();
        $number5 = Order::where('status_id',5)->count();
        $number6 = Order::where('status_id',6)->count();
        $number7 = Order::where('status_id',7)->count();
        $number8 = Order::where('status_id',8)->count();
        $number9 = Order::where('status_id',9)->count();
        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $province_id = isset($inputs['province'])?$inputs['province']:1;
        $city_id = isset($inputs['city'])?$inputs['city']:169;

        return view('orderCheck.index',compact('orders','a','statuses','number1','number2','number3',
            'number4','number5','number6','number7','number8','number9','regions', 'provinces',
            'cities','province_id','city_id'));
    }


}
