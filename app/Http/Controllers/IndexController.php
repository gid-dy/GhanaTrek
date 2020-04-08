<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourpackages;
use App\Tourpackagecategory;

class IndexController extends Controller
{
    public function index()
    {
        //Get all tour packages
        $tourpackagesAll = Tourpackages::InRandomOrder()->where('Status',1)->where('featured_tour',1)->paginate(6);
        // $tourpackagesAll = json_decode(json_encode($tourpackagesAll));
        //get all categories
        $tourpackagecategory = Tourpackagecategory::with('tourcategories')->where($id=null)->get();

        //Meta tags
        $meta_title = "GhanaTrek";
        $meta_description = "Online Booking WebApp for tourism";
        $meta_keywords = "GhanaTrek, Onilne Booking Site";
        return view('index')->with(compact('tourpackagesAll','tourpackagecategory','meta_title','meta_description','meta_keywords'));
    }
}
