<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servesModel;
use App\ReviewModel;

class aboutUsController extends Controller
{
    function aboutUsPage(){

        $servesData=json_decode(servesModel::orderBy('id','desc')->get());
        $ReviewData=json_decode(ReviewModel::all());

        return view('aboutPage',['servesData'=>$servesData,'ReviewData'=>$ReviewData]);
    }
}
