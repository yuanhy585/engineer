<?php

namespace App\Http\Controllers;
use App\Material;
use Gate, Auth, Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

class MaterialController extends Controller
{
    public function index()
    {
        if (Gate::denies('manage_material',Auth::user()))
        {
            return Redirect::back();
        }

        $materials = Material::all();

        return view('materials.index', compact('materials'));
    }


    public function create()
    {
        if (Gate::denies('manage_material',Auth::user()))
        {
            return Redirect::back();
        }
        $specials = Material::all()->pluck('special','special');
        $categories = Material::all()->pluck('category','category');
        $types = Material::all()->pluck('type','type');
        return view('materials.create',compact('specials','categories','types'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage_material',Auth::user()))
        {
            return Redirect::back();
        }

        $inputs = $request->all();

        $material = new Material();
        $material->special = $inputs['special'];
        $material->category = $inputs['category'];
        $material->type = $inputs['type'];
        $material->name = $inputs['name'];
        $material->price = $inputs['price'];

        $material->save();

        return redirect('/materials');

    }

    public function show($id)
    {
        $material = Material::where('id',$id)->first();
        return view('materials.show',compact('material'));
    }

    public function edit($id)
    {
        $material = Material::where('id',$id)->first();;

        $specials = Material::all()->pluck('special','special');
        $categories = Material::all()->pluck('category','category');
        $types = Material::all()->pluck('type','type');
        return view('materials.edit',compact('material','specials','categories','types'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::where('id',$id)->first();
        $inputs = $request->all();

        if (isset($inputs['special']))
        {
            $material->special = $inputs['special'];
        }
        if (isset($inputs['category']))
        {
            $material->category = $inputs['category'];
        }
        if (isset($inputs['type']))
        {
            $material->type = $inputs['type'];
        }
        if (isset($inputs['name']))
        {
            $material->name = $inputs['name'];
        }
        if (isset($inputs['price']))
        {
            $material->price = $inputs['price'];
        }

        $material->save();

        return redirect('/materials');

    }

    public function destroy($id)
    {
        $material = Material::where('id',$id)->first();
        $material->delete();
        return back();
    }

}
