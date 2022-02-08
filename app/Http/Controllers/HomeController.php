<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactAddress;
use App\Models\Post;
use App\Models\Social;
use Exception;
use Illuminate\Http\Request;
// use Phpfastcache\Helper\Psr16Adapter;

class HomeController extends Controller
{
    //

    public function index(){

        // get instagram content 
            // $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(),'be.ifti','beifti@FB#01', new Psr16Adapter('Files')); 
            // $instagram->login();
            // $instagram->saveSession();
            // $account = $instagram->getAccount('be.ifti');
            // $aacountMedias = $account->getMedias();
            // foreach($aacountMedias as $key => $accountMedia){
            //     $images[$key] = str_replace('&amp;','&', $accountMedia->getimageHighResolutionUrl());
            //     $path = $images[$key];
            //     $imageName = $key.'.png';
            //     $img = public_path('uploads/instagram/').$imageName;
            //     file_put_contents($img, file_get_contents($path));
            // }
        //end instagram content
        // $comments = Comment::where('post_id',$get_post->id);
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getActivePosts = Post::where('status','=',1)->orderBy('created_at','DESC')->paginate(20);
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        $get_contact_info = ContactAddress::limit(1)->first();
        return view('index', compact('getActivePosts','getActiveSocialMedia','featurePost','getactivecategories','get_contact_info'));
    }
    public function show($slug){
        try{
            $get_post = Post::where('slug','=',$slug)->first();
            $comments = Comment::where('post_id',$get_post->id)->orderBy('created_at','DESC')->paginate(10);
            $getRandomPost = Post::where('slug','!=',$slug)->inRandomOrder()->limit('2')->get();
            $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
            $featurePost = Post::where('slug','!=',$slug)->inRandomOrder()->limit(3)->get();
            $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
            $get_contact_info = ContactAddress::limit(1)->first();
            return view('post',compact('get_post','getRandomPost','getActiveSocialMedia','featurePost','getactivecategories','comments','get_contact_info'));
        }catch(Exception $e){
            return back();
        }
    }

    public function listView($cat){
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getCategoryPosts = Post::where('category','=',$cat)->orderBy('created_at','DESC')->paginate(10);
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        $trendingPosts = Post::orderBy('created_at', 'DESC')->limit(5)->get();
        $get_contact_info = ContactAddress::limit(1)->first();
        return view('blog_category_list', compact('cat','getactivecategories','getCategoryPosts','getActiveSocialMedia','featurePost','trendingPosts','get_contact_info'));
    }
    public function gridView($cat){
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getCategoryPosts = Post::where('category','=',$cat)->orderBy('created_at','DESC')->paginate(10);
        $trendingPosts = Post::orderBy('created_at', 'DESC')->limit(5)->get();
        $get_contact_info = ContactAddress::limit(1)->first();
        return view('blog_category_grid', compact('cat','getCategoryPosts','getactivecategories','getActiveSocialMedia','featurePost','trendingPosts','get_contact_info'));
    }
}
