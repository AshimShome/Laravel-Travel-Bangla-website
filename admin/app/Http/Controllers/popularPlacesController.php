<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\popularPlacesModel;


class popularPlacesController extends Controller
{
    function popularPlacesIndex(){
       
        return view('popularPlace');
    }

    function getPopularPlacesData(){
        $resultData=json_encode(popularPlacesModel::orderBy('id','desc')->get());
        return $resultData;
    }

    function getPopularPlacesDetails(Request $req){
        $id=$req->input('id');
        $result=popularPlacesModel::where('id','=',$id)->get();       
         return $result;
    }

  
    function deletePopularPlacesData(Request $req){

        $id=$req->input('id');
        $result=popularPlacesModel::where('id','=',$id)->delete();

        if($result== true){
        
            return 1;

        }else{
            return 0;
        }
        
    }
    function updatePopularPlacesData(Request $req){

           $id=$req->input('id');



        $image_link=$req->input('image_link');
        $place_name=$req->input('place_name');
        $place_desc=$req->input('place_desc');
        $review=$req->input('review');
        $Days=$req->input('Days');
        $offer_price=$req->input('offer_price');


 $result=popularPlacesModel::where('id','=',$id)->update(['image_link'=> $image_link,'place_name'=> $place_name,
 'place_desc'=>$place_desc,'review'=> $review,'Days'=> $Days,'offer_price'=>$offer_price]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

     function PopularPlacesAdd(Request $req){



        $image_link=$req->input('image_link');
        $place_name=$req->input('place_name');
        $place_desc=$req->input('place_desc');
        $review=$req->input('review');
        $Days=$req->input('Days');
        $offer_price=$req->input('offer_price');


        $result=popularPlacesModel::insert(['image_link'=> $image_link,'place_name'=> $place_name,
        'place_desc'=>$place_desc,'review'=> $review,'Days'=> $Days,
        'offer_price'=>$offer_price]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    

}
