<?php

namespace App\Http\Controllers;
use App\EmOrders;
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
            $shop = Shop::where('id',$id)->first();

	        return view('orders.create',compact('id','order','shop'));
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
            //对可为空的字段需要用isset()进行条件判断，默认为none的字段不用，
            //      但手动添加内容除外。此时需要用errors_for()进行提示
	    	$order->orderCode = isset($inputs['orderCode'])?$inputs['orderCode']:"";
	    	$order->theme = isset($inputs['theme'])?$inputs['theme']:"";
	    	$order->needMeasure = $inputs['needMeasure'];
	    	$order->needInstall = $inputs['needInstall'];
	    	$order->remark = isset($inputs['remark'])?$inputs['remark']:"";
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
        $order->remark = isset($inputs['remark'])?$inputs['remark']:"";
        $order->theme = isset($inputs['theme'])?$inputs['theme']:"";
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
        $material_names = Material::all()->pluck('name','id');
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
        $materialOrder->position = isset($inputs['position'])?$inputs['position']:"";
        $materialOrder->width = isset($inputs['width'])?$inputs['width']:"";
        $materialOrder->height = isset($inputs['height'])?$inputs['height']:"";
        $materialOrder->number = $inputs['number'];
        $materialOrder->remark = isset($inputs['remark'])?$inputs['remark']:"";
        $materialOrder->area = $inputs['area'];
        $materialOrder->material_id = $inputs['name'];
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
        $material_names = Material::all()->pluck('name','id');
//        dd($material_names);
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
        $material_order->material_id = $inputs['name'];
        $material_order->position = isset($inputs['position'])?$inputs['position']:"";
        $material_order->width = isset($inputs['width'])?$inputs['width']:"";
        $material_order->height = isset($inputs['height'])?$inputs['height']:"";
        $material_order->area = $inputs['area'];
        $material_order->number = $inputs['number'];
        $material_order->remark = isset($inputs['remark'])?$inputs['remark']:"";
        $material_order->save();

//        dd($material_order);

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

    public function getEngineer()
    {
        if(Gate::denies('distribute_order',Auth::user()))
        {
            return Redirect::back();
        }

        $engineers = User::where('department_id',4)->get();
        return view('orders.engineer',compact('engineers'));
    }

    public function assignedOrder($user_id)
    {
        if (Gate::denies('distribute_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order_ids = EmOrders::where('user_id',$user_id)->pluck('order_id');
        $orders = Order::whereIn('id',$order_ids)->get();
        return view('orders.assignedOrders',compact('orders','user_id'));
    }

    public function cancelAssignedOrder(Request $request,$user_id)
    {
        if (Gate::denies('distribute_order',Auth::user()))
        {
            return Redirect::back();
        }
//        只获取保存内容的某一部分，用input()，参看文档http请求。写input名字时不可再加[]符号
        $selected_ids = $request->input('assignedOrders');
//        传过来的是一个数组，包含多个值。
        foreach ($selected_ids as $selected_id)
        {
            $assignedOrder = EmOrders::where('user_id',$user_id)->where('order_id',$selected_id)->first();
            if ($assignedOrder)
            {
                $assignedOrder->delete();
            }
        }

        return back();
    }

    public function distributeOrder($user_id)
    {
        if(Gate::denies('distribute_order',Auth::user()))
        {
            return Redirect::back();
        }

        $assignedOrder_ids = EmOrders::all()->pluck('order_id');
        $orders = Order::where('needMeasure', 1)->where('needInstall', 1)
                    ->whereNotIn('id',$assignedOrder_ids)
                    ->get();
        return view('orders.distribution',compact('user_id','orders'));
    }

    public function storeAssignedOrder(Request $request, $user_id)
    {
        if (Gate::denies('distribute_order',Auth::user()))
        {
            return Redirect::back();
        }
        $order_ids = $request->input('assignOrders');
        foreach ($order_ids as $order_id)
        {
            $assignedOrder = EmOrders::where('user_id',$user_id)->where('order_id',$order_id)->first();
            if (!$assignedOrder)
            {
                $em_order = new EmOrders();
                $em_order->order_id = $order_id;
                $em_order->user_id = $user_id;
                $em_order->save();
            }
        }

        return back();

    }

    public function ajaxTN(Request $request)
    {
        $inputs = $request->all();
        $names = Material::where('type',$inputs['type'])->get();

        return $names;
    }

}
