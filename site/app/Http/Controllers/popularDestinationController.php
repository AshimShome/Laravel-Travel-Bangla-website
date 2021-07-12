<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\popularDestination;
class popularDestinationController extends Controller
{
    function  popularDestinationPage(){

        $popularDestinationData=json_decode(popularDestination::orderBy('id','desc')->get());
        return view('popularDestination',['popularDestinationData'=>$popularDestinationData]);
    }
}
