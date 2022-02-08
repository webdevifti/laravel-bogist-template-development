<?php

namespace App\Http\Controllers;

use App\Models\About;
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
        $get_about_content = About::limit(1)->first();
        return view('about',compact('get_about_content','getActiveSocialMedia','featurePost','getactivecategories'));
    }
}
