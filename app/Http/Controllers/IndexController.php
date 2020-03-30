<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourpackages;
use App\Tourpackagecategory;

class IndexController extends Controller
{
    public function index()
    {

        $tourpackagesAll = Tourpackages::InRandomOrder()->where('Status',1)->where('featured_tour',1)->get();
        $tourpackagesAll = json_decode(json_encode($tourpackagesAll));
        $tourpackagecategory = Tourpackagecategory::with('tourcategories')->where($id=null)->get();
        return view('index')->with(compact('tourpackagesAll','tourpackagecategory'));
    }
}
