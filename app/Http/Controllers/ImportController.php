<?php

namespace App\Http\Controllers;
use App\Province;
use Gate,Auth,Redirect,Excel;


use Illuminate\Http\Request;

use App\Http\Requests;

class ImportController extends Controller
{
    public function provinceImport()
    {
        if (Gate::denies('import_province',Auth::user()))
        {
            return Redirect::back();
        }

        return view('import.province');
    }

    public function provinceReceive(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $extension = $request->file('file')->getClientOriginalExtension();
            if($extension != 'xls' && $extension != 'xlsx')
            {
                return redirect()->back()->withInput()->withErrors(['file'=>'该扩展名不符合要求']);
            }

            $dataAll = Excel::load($request->file('file'))->sheet(0)->toArray();

            array_shift($dataAll);

            foreach ($dataAll as $data)
            {
                $provinceData = Province::where('name',$data[0])->first();
                if(!$provinceData)
                {
                    $provinceData = new Province();
                    $provinceData->name = isset($data[0])?$data[0]:null;

                    $provinceData->save();
                }

            }
        }

        echo "导入成功,请返回刷新查看";

    }



}
