<?php

namespace App\Http\Controllers;
use Auth, Gate, Redirect;
use App\Order;
use App\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
	public function index($id)//这里的id就是从路由传过来的shop->id
	{
		if(Gate::denies('manage_order',Auth::user()))
		{
			return Redirect::back();
		}

		//$shop_id = Shop::all()->pluck('id');//这个不对，你是取得了所有的门店，应该是单个的
        $shop_id = $id;
		$orders = Order::where('shop_id',$shop_id)->get();

		return view('orders.index',compact('orders'));
	}

	

	    public function create($id)
	    {
	        if(Gate::denies('manage_order', Auth::user()))
	        {
	            return Redirect::back();
	      }
	        
//	        $id = Shop::all()->pluck('id')->first();//不要这句,直接用传过来的shop->id
	        return view('orders.create',compact('id'));
	    }


	    public function store(Request $request,$id)//这个$id参数就是create.blade.php传过来的，现在可以看到它一直都是通过路由传输。其他的参数都是直接通过$request->all()接收的
	    {
	    	if(Gate::denies('manage_order', Auth::user()))
	    	{
	    		return Redirect::back();
	    	}

	    	$inputs = $request->all();
	    	$order= new Order();
	    	$order->order_id = $inputs['order_id'];
	    	$order->shop_id = $inputs['shop_id'];
	    	$order->orderCode = $inputs['orderCode'];
	    	$order->theme = $inputs['theme'];
	    	$order->needMeasure = $inputs['needMeasure'];
	    	$order->needInstall = $inputs['needInstall'];
	    	$order->remark = $inputs['remark'];
	    	$order->save();

	    	return redirect('/shops/'.$id.'/orders');//拼接字符串
	    }


}
