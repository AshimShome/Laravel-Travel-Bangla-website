<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\popularPlacesModel;


class popularPlacesController extends Controller
{
    function  popularPlacesPage(){

        $popularPlacesData=json_decode(popularPlacesModel::orderBy('id','desc')->get());
        return view('popularPlaces',['popularPlacesData'=>$popularPlacesData]);
    }
}
