<?php

namespace App\Http\Controllers;
use Auth, Gate, Redirect;
use App\Order;
use App\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
	public function index()
	{
		if(Gate::denies('manage_order',Auth::user()))
		{
			return Redirect::back();
		}

		$shop_id = Shop::all()->pluck('id');
		$orders = Order::where('shop_id',$shop_id)->get();

		return view('orders.index',compact('orders'));
	}

	

	    public function create()
	    {
	        if(Gate::denies('manage_order', Auth::user()))
	        {
	            return Redirect::back();
	      }
	        
	        $id = Shop::all()->pluck('id')->first();
	        return view('orders.create',compact('id'));
	    }


	    public function store(Request $request)
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

	    	return redirect('/orders');
	    }


}
