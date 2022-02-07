<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        return view('about',compact('getActiveSocialMedia'));
    }
}
