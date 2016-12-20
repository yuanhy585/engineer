<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Language;
use App\User;
use Auth,Gate,Redirect;


use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if(Gate::denies('manage_user',Auth::user()))
        {
            return Redirect::back();
        }
        $inputs = $request->has('select')?json_decode($request->input('select'),true):$request->all();

        $users = User::where(function($query) use ($inputs){
            if(isset($inputs['findByUserName'])){
                $query->where('name','LIKE','%'.$inputs['findByUserName'].'%');
            }
        })
            ->WhereHas('department',function ($in) use ($inputs){
                if(isset($inputs['department_id']) && $inputs['department_id'] != 0)
                {
                    $in->where("department_id",$inputs['department_id']);
                }
            })
            ->paginate(5);
        $a = $inputs;
        $departments = Department::all()->pluck('title','id');
        return view('users.index',compact('users','a','departments'));
    }

    public function create()
    {
        $departments = Department::all()->pluck('title','id');
        $languages = Language::all()->pluck('title','id');
        return view('users.create',compact('departments','languages'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        //加过滤，邮箱唯一性
        $user = User::where('email',$inputs['email'])->first();
        if($user)
        {
            return Redirect::back()->withErrors(['email'=>trans('user.error_tag')])->withInput();
        }

        $user = new User();
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->language_id = $inputs['language_id'];
        $user->department_id = $inputs['department_id'];
        $user->save();

        return redirect('/users');
    }

    public function show($id)
    {
//        error_log(only for string); dd for all types; console show
        $user = User::where('id',$id)->first();
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $departments = Department::all()->pluck('title','id');
        $languages = Language::all()->pluck('title','id');
        return view('users.edit',compact('user','departments','languages'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $emails = User::all()->pluck('email')->toArray();

        $inputs = $request->all();
        if(in_array($inputs['email'],$emails))
        {
            return Redirect::back()->withErrors(['email'=>trans('user.error_tag')])->withInput();
        }
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->language_id = $inputs['language_id'];
        $user->department_id = $inputs['department_id'];
        $user->save();

        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();

        return back();
    }

}
