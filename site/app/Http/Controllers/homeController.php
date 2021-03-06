<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitorModel;
use App\servesModel;
use App\courseModel;
use App\projectModel;
use App\contuctModel;
use App\ReviewModel;
use App\popularDestination;
use App\popularPlacesModel;





class homeController extends Controller
{
   function homeIndex(){
       $userIP=$_SERVER['REMOTE_ADDR'];
       date_default_timezone_set("Asia/Dhaka");
       $timeData=date('m/d/Y h:i:s a', time());;

       visitorModel::insert(['ip_address'=>$userIP,'visit_time'=>$timeData]);

       $serviceData=json_decode(servesModel::all());
       $popularDestinationData=json_decode(popularDestination::orderBy('id','desc')->limit(6)->get());
       $projectData=json_decode(projectModel::orderBy('id','desc')->limit(10)->get());
       $ReviewData=json_decode(ReviewModel::all());

       $popularPlaceData=json_decode(popularPlacesModel::orderBy('id','desc')->limit(9)->get());




       return view('home',['serviceData'=>$serviceData,'popularDestinationData'=>$popularDestinationData,
           'projectData'=>$projectData,'ReviewData'=>$ReviewData,'popularPlaceData'=>$popularPlaceData]);
   }
   function contactSend(Request $request){
      $contact_name =$request->input('contact_name');
       $contact_mobile =$request->input('contact_mobile');
       $contact_email =$request->input('contact_email');
       $contact_msg =$request->input('contact_msg');

       $result=contuctModel::insert([
           'contact_name'=>$contact_name,
           'contact_mobile'=>$contact_mobile,
           'contact_email'=>$contact_email,
           'contact_msg'=>$contact_msg

       ]);
       if($result==true){
           return 1;
       }else{
           return 0;
       }

   }
}
