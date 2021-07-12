<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courseModel;

class contactController extends Controller
{
    function ContactPage(){

        return view('contact');
    }
}
