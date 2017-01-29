<?php

namespace App\Http\Controllers;
use App\City;
use App\DmUser;
use App\Language;
use App\Order;
use App\Province;
use App\Region;
use App\Shop;
use App\User;
use Auth, Gate, Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

class SaleController extends Controller
{
    public function index()
    {
        if(Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }

        $users = User::where('department_id',1)->get();


        return view('sales.index',compact('users'));
    }

    public function create()
    {
        if(Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }

        $managers = User::where('department_id',2)->get();
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $languages = Language::all()->pluck('title','id');
        $province_id = 1;
        $city_id = 169;
        return view('sales.create',compact('managers','provinces','cities',
            'languages','province_id','city_id'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }

        $inputs = $request->all();
        $user= User::where('email',$inputs['email'])->first();
        $phones = User::all()->pluck('phone')->toArray();
        if($user)
        {
            return Redirect::back()->withInput()->withErrors(['email'=>trans('sale.error_tag')]);
        }

        $user = new User();
        $user->name = $inputs['name'];
        $user->department_id = $inputs['department_id'];
        if (in_array($inputs['phone'], $phones))
        {
            return Redirect::back()->withInput()->withErrors(['phone'=>trans('sale.error_tag')]);
        }
        $user->phone = $inputs['phone'];
        $user->password = bcrypt($inputs['password']);
        $user->email = $inputs['email'];
        $user->language_id = $inputs['language_id'];
        $user->city_id = $inputs['city_id'];
        $user->save();

        $dm_user = new DmUser();
        $dm_user->dm_id = $inputs['manager_id'];
        $dm_user->user_id = User::where('phone',$inputs['phone'])->first()->id;
        $dm_user->save();

        return redirect('/user/sale');
    }

    public function edit($id)
    {
        if (Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }

        $user = User::where('id',$id)->first();
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');

        return view('sales.edit',compact('user','provinces','cities'));
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }

        $inputs = $request->all();
        $phones = User::all()->pluck('phone')->toArray();
        $user = User::where('id',$id)->first();
        $user->name = $inputs['name'];
        if(in_array($inputs['phone'],$phones))
        {
            return Redirect::back()->withInput()->withErrors(['phone'=>trans('sale.error_tag')]);
        }
        $user->phone = $inputs['phone'];
        $user->city_id = $inputs['city_id'];
        $user->save();

        return redirect('/user/sale');
    }

    public function destroy($id)
    {
        if (Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }
        $user = User::where('id',$id)->first();
        $user->delete();

        return back();
    }

    public function saleIndex()
    {
        if (Gate::denies('manage_sale',Auth::user()))
        {
            return Redirect::back();
        }

        $dm_id = Auth::user()->id;
        $seller_ids = DmUser::where('dm_id',$dm_id)->pluck('user_id');
        $users = User::whereIn('id',$seller_ids)->get();

        return view('sales.saleIndex',compact('users'));
    }

    public function all()
    {
        if (Gate::denies('manage_sale',Auth::user()))
        {
            return Redirect::back();
        }

        $regions = Region::all()->pluck('name','id');
        $provinces = Province::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $province_id = 1;
        $city_id = 169;
        $seller_ids = User::whereIn('id',DmUser::where('dm_id',Auth::user()->id)->pluck('user_id'))->pluck('id');
        $orders = Order::whereIn('shop_id', Shop::whereIn('user_id',$seller_ids)->pluck('id'))->get();


        return view('sales.dmOrders',compact('regions','provinces','cities','province_id',
            'city_id','orders'));
    }



    public function censor()
    {

    }


}
