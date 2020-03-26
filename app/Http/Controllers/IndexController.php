<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourpackages;
use App\Tourpackagecategory;

class IndexController extends Controller
{
    public function index()
    {
        $tourpackagesAll = Tourpackages::get();
        $tourpackagecategory = Tourpackagecategory::with('tourcategories')->where($id=null)->get();
        return view('index')->with(compact('tourpackagesAll','tourpackagecategory'));
    }
}
