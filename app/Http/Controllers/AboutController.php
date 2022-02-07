<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Social;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        return view('about',compact('getActiveSocialMedia','featurePost','getactivecategories'));
    }
}
