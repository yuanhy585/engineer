<?php

namespace App\Http\Controllers;
use App\Material;
use App\Province;
use Gate,Auth,Redirect,Excel;


use Illuminate\Http\Request;

use App\Http\Requests;

class ImportController extends Controller
{

    //import province data
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

            $data = Excel::load($request->file('file'))->sheet(0)->toArray();

            array_shift($data);

            foreach ($data as $datum)
            {
                $provinceData = Province::where('name',$datum[0])->first();
                if(!$provinceData)
                {
                    $provinceData = new Province();
                    $provinceData->name = isset($datum[0])?$datum[0]:null;

                    $provinceData->save();
                }

            }
        }

        echo "导入成功,请返回刷新查看";

    }


    //import material data
    public function materialImport()
    {
        if (Gate::denies('import_material', Auth::user()))
        {
            return Redirect::back();
        }
        return view('import.material');
    }

    public function materialReceive(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $extension = $request->file('file')->getClientOriginalExtension();

            if($extension != 'xls' && $extension != 'xlsx')
            {
                return redirect()->back()->withInput()->withErrors(['file'=>'该扩展名不符合要求']);
            }

            $data = Excel::load($request->file('file'))->sheet(0)->toArray();


            array_shift($data);

//            dd($data);

            foreach ($data as $datum )
            {
                $materialData = Material::where('id',$datum[0])->first();
                if(!$materialData)
                {
                    $materialData = new Material();
                    $materialData->name = isset($datum[1])?$datum[1]:null;
                    $materialData->price = isset($datum[2])?$datum[2]:null;
                    $materialData->type = isset($datum[3])?$datum[3]:null;
                    $materialData->category = isset($datum[4])?$datum[4]:null;
                    $materialData->special = isset($datum[5])?$datum[5]:null;

                    $materialData->save();
                }

            }
        }

        echo "导入成功,请返回刷新查看";
    }

}
