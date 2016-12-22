<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MaterialController extends Controller
{
    public function index()
    {
        if (Gate::denies('manage_'))
        return view('materials.index');
    }

}
