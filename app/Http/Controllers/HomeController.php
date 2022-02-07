<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        return view('index', compact('getActivePosts','getActiveSocialMedia','featurePost','getactivecategories'));
    }
    public function show($slug){
        try{
            $get_post = Post::where('slug','=',$slug)->first();
            $getRandomPost = Post::where('slug','!=',$slug)->inRandomOrder()->limit('2')->get();
            $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
            $featurePost = Post::where('slug','!=',$slug)->inRandomOrder()->limit(3)->get();
            $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
            return view('post',compact('get_post','getRandomPost','getActiveSocialMedia','featurePost','getactivecategories'));
        }catch(Exception $e){
            return back();
        }
    }

    public function listView($cat){
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getCategoryPosts = Post::where('category','=',$cat)->orderBy('created_at','DESC')->get();
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        $trendingPosts = Post::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('blog_category_list', compact('cat','getactivecategories','getCategoryPosts','getActiveSocialMedia','featurePost','trendingPosts'));
    }
    public function gridView($cat){
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getCategoryPosts = Post::where('category','=',$cat)->orderBy('created_at','DESC')->get();
        $trendingPosts = Post::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('blog_category_grid', compact('cat','getCategoryPosts','getactivecategories','getActiveSocialMedia','featurePost','trendingPosts'));
    }
}
