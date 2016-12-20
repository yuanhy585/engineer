<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserAPIController extends Controller
{
    public function getUserList(Request $request)
    {
        $id = $request->get('id');
        $count = User::where('id',$id)->count();

        Auth::loginUsingId($id);   // 登录后才可进行下面的操作，相当于过滤功能
        if($count==0)
        {
            $rtn = 101;
            $message = "人员名单获取失败";
            $response = ['code'=>$rtn,'message'=>$message,'data'=>[]];
        }
        else
        {

            $datas = array();
            $inputs = User::where('id',$id)->get();
            foreach($inputs as $user)
            {
                $data['name']=$user->name;
                $data['email']=$user->email;
                $data['language_id']=$user->language_id;
                $data['department_id']=$user->department_id;

                $datas[]=$data;
            }

            $rtn = 100;
            $message = "人员名单获取成功";
            $response = ['code'=>$rtn,'message'=>$message,'data'=>$datas];
        }
        return response()->json($response);
    }
}
