<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\popularDestination;
class popularDestinationController extends Controller
{
    function popularDestinationIndex(){
       
        return view('popularDestination');
    }

    function getpopularDestinationData(){
        $resultData=json_encode(popularDestination::orderBy('id','desc')->get());
        return $resultData;
    }

    function getpopularDestinationDetails(Request $req){
        $id=$req->input('id');
        $result=popularDestination::where('id','=',$id)->get();       
         return $result;
    }

  
    function deletepopularDestinationData(Request $req){

        $id=$req->input('id');
        $result=popularDestination::where('id','=',$id)->delete();

        if($result== true){
        
            return 1;

        }else{
            return 0;
        }
        
    }
    function updatepopularDestinationData(Request $req){

           $id=$req->input('id');

        $popularDestination_img=$req->input('popularDestination_img');
        $popularDestination_name=$req->input('popularDestination_name');
        $popularDestination_place=$req->input('popularDestination_place');



 $result=popularDestination::where('id','=',$id)->update(['popularDestination_img'=> $popularDestination_img,
 'popularDestination_name'=> $popularDestination_name,'popularDestination_place'=>$popularDestination_place]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

     function popularDestinationAdd(Request $req){

        $popularDestination_img=$req->input('popularDestination_img');
        $popularDestination_name=$req->input('popularDestination_name');
        $popularDestination_place=$req->input('popularDestination_place');

       

        $result=popularDestination::insert(['popularDestination_img'=> $popularDestination_img,
        'popularDestination_name'=> $popularDestination_name,
        'popularDestination_place'=>$popularDestination_place]);

        if($result== true){
        
            return 1;

        }else{
            return 0;

        }
        
    }

    //function detailsCourses(Request $req){
      //  $id=$req->input('id');
       // $result=courseModel::where('id','=',$id)->get();       
       //  return $result;
  //  }

}
