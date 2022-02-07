<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Social;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getActivePosts = Post::where('status','=',1)->orderBy('created_at','DESC')->get();
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        return view('index', compact('getActivePosts','getActiveSocialMedia','featurePost'));
    }
    public function show($slug){
        try{
            $get_post = Post::where('slug','=',$slug)->first();
            $getRandomPost = Post::where('slug','!=',$slug)->inRandomOrder()->limit('2')->get();
            $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
            $featurePost = Post::where('slug','!=',$slug)->inRandomOrder()->limit(3)->get();
            return view('post',compact('get_post','getRandomPost','getActiveSocialMedia','featurePost'));
        }catch(Exception $e){
            return back();
        }
    }
}
