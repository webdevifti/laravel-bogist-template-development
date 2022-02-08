<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactAddress;
use App\Models\Post;
use App\Models\Social;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $featurePost = Post::inRandomOrder()->limit(3)->get();
        $getActiveSocialMedia = Social::where('status','=',1)->orderBy('created_at','DESC')->get();
        $getactivecategories = Category::where('status','=',1)->orderBy('created_at','DESC')->get();
        $get_contact_info = ContactAddress::limit(1)->first();
        return view('contact',compact('get_contact_info','getActiveSocialMedia','featurePost','getactivecategories'));
    }
}
