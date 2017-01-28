<?php

namespace App\Http\Controllers;
use App\Material;
use App\MaterialOrder;
use App\User;
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
        $shop = Shop::where('id',$shop_id)->first();

		return view('orders.index',compact('orders','shop'));
	}

	

	    public function create($id)
	    {
	        if(Gate::denies('manage_order', Auth::user()))
	        {
	            return Redirect::back();
	        }
//	        $id = Shop::all()->pluck('id')->first();//不要这句,直接用传过来的shop->id
            $order = Order::where('shop_id',$id)->first();

	        return view('orders.create',compact('id','order'));
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

    public function edit($id)
    {
        if(Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order = Order::where('id',$id)->first();
        $sellers = User::where('department_id',1)->get()->pluck('phone','name');
        return view('orders.edit',compact('order','sellers'));
	}


    public function update(Request $request, $id)
    {
        if (Gate::denies('manage_order',Auth::user()))
        {
            return back();
        }
        $order = Order::where('id',$id)->first();

        $inputs = $request->all();
        $order->needMeasure = $inputs['measure'];
        $order->needInstall = $inputs['install'];
        $order->remark = $inputs['remark'];
        $order->theme = $inputs['theme'];
        $order->save();


        return redirect('/shops/'.$order->shop_id.'/orders');
    }


    public function materialIndex($id)  //$id是orders表中的id
    {
        if(Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order = Order::where('id',$id)->first();
        $material_orders = MaterialOrder::where('order_id',$id)->get();

        return view('orders.materialIndex',compact('order','material_orders'));
	}

    public function materialAdd($id)
    {
        if(Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order = Order::where('id',$id)->first();
        // 去重-pluck()中两个参数名字相同
        $material_types = Material::all()->pluck('type','type');
        $material_names = Material::all()->pluck('name');
        $material_order = MaterialOrder::where('order_id',$id)->first();
        return view('orders.materialAdd',compact('order','material_types',
            'material_names','material_order'));
	}

    public function materialStore(Request $request, $id)
    {
        if(Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }

        $inputs = $request->all();
        $materialOrder = new MaterialOrder();
        $materialOrder->position = $inputs['position'];
        $materialOrder->width = $inputs['width'];
        $materialOrder->height = $inputs['height'];
        $materialOrder->number = $inputs['number'];
        $materialOrder->remark = $inputs['remark'];
        $materialOrder->area = $inputs['area'];
        $materialOrder->material_id = $inputs['material_id'];
        $materialOrder->order_id = $inputs['order_id'];

        $materialOrder->save();

        return redirect('/orders/'.$id.'/material_index');
	}

    public function materialEdit($id)
    {
        if(Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }

        $material_types = Material::all()->pluck('type','type');
        $material_names = Material::all()->pluck('name');
        $material_order = MaterialOrder::where('id',$id)->first();
        return view('orders.materialEdit',compact('material_types','material_names',
            'material_order'));
	}

    public function materialUpdate(Request $request, $id)
    {
        if (Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }

        $material_order = MaterialOrder::where('id',$id)->first();
        $inputs = $request->all();
        $material_order->position = $inputs['position'];
        $material_order->width = $inputs['width'];
        $material_order->height = $inputs['height'];
        $material_order->area = $inputs['area'];
        $material_order->number = $inputs['number'];
        $material_order->remark = $inputs['remark'];
        $material_order->save();

        return redirect('/orders/'.$material_order->order_id.'/material_index');
	}

    public function materialDelete($id)
    {
        if (Gate::denies('manage_order',Auth::user()))
        {
            return Redirect::back();
        }
        $material_order = MaterialOrder::where('id',$id)->first();
        $material_order->delete();

        return back();
    }

    public function ajaxTN(Request $request)
    {
        $inputs = $request->all();
        $names = Material::where('type',$inputs['type'])->get();

        return $names;
    }

}
