<?php

namespace App\Http\Controllers;
use App\EmOrders;
use App\Order;
use Gate, Auth, Redirect,Storage;

use Illuminate\Http\Request;

use App\Http\Requests;

class MeasureInstallController extends Controller
{
    public function getMeasured()
    {
        if (Gate::denies('measure_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order_ids = Order::whereIn('id',EmOrders::where('measured',1)->pluck('order_id'))
                    ->pluck('order_id');
        $orders = Order::whereIn('order_id',$order_ids)->get();

        return view('measureInstall.measured',compact('orders'));
    }

    public function waitMeasure()
    {
        if (Gate::denies('measure_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order_ids = Order::whereIn('id',EmOrders::where('measured',0)->pluck('order_id'))
            ->pluck('order_id');
        $orders = Order::whereIn('order_id',$order_ids)->get();

        return view('measureInstall.notMeasured',compact('orders'));
    }

    public function measure()
    {
        if (Gate::denies('measure_order',Auth::user()))
        {
            return Redirect::back();
        }

        $order_ids = Order::whereIn('id',EmOrders::all()->pluck('order_id'))
            ->pluck('order_id');
        $orders = Order::whereIn('order_id',$order_ids)->get();

        return view('measureInstall.measure',compact('orders'));
    }

    public function getInstalled()
    {
        if (Gate::denies('install_order',Auth::user()))
        {
            return Redirect::back();
        }
        $order_ids = Order::whereIn('id',EmOrders::where('installed',1)->pluck('order_id'))
            ->pluck('order_id');
        $orders = Order::whereIn('order_id',$order_ids)->get();

        return view('measureInstall.installed',compact('orders'));
    }

    public function waitInstall()
    {
        if (Gate::denies('install_order',Auth::user()))
        {
            return Redirect::back();
        }
        $order_ids = Order::whereIn('id',EmOrders::where('installed',0)->pluck('order_id'))
            ->pluck('order_id');
        $orders = Order::whereIn('order_id',$order_ids)->get();

        return view('measureInstall.notInstalled',compact('orders'));
    }

    public function install()
    {
        if (Gate::denies('install_order',Auth::user()))
        {
            return Redirect::back();
        }
        $order_ids = Order::whereIn('id',EmOrders::all()->pluck('order_id'))
            ->pluck('order_id');
        $orders = Order::whereIn('order_id',$order_ids)->get();

        return view('measureInstall.install',compact('orders'));
    }

    public function storeImage(Request $request, $order_id)
    {
//        $inputs = $request->all();
//        Storage::put('/public/img/'.$order_id.'.png',file_get_contents($inputs['image']));


//        if (Gate::denies('measure_order',Auth::user()))
//        {
//            return Redirect::back();
//        }
//
//        $input = $request->all();
        return back();
    }

}
