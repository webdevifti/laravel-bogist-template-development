<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function index(){
        $get_data = About::limit(1)->first();
        // dd($get_data);
        return view('admin.about.index', compact('get_data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'about_content' => 'required',
        ]);
        if($request->about_feature_image){
            $request->validate([
            'about_feature_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $about = About::findOrfail($id);
            $newImageName = uniqid().'_about_feature_image_'.'.'.$request->about_feature_image->extension();
            unlink(public_path('uploads/abouts/'.$about->about_feature_image));
            $request->about_feature_image->move(public_path('uploads/abouts/'), $newImageName);
            try{
                $about->about_feature_image = $newImageName;
                $about->about_content = $request->about_content;
                $about->save();
          
                return back()->with('success','Save Changed!');
            }catch(Exception $e){
                return back()->with('error','Could not Updated!');
            }
        }else{
           
            try{
                $about = About::findOrfail($id);
                $about->about_content = $request->about_content;
                $about->save();
          
                return back()->with('success','Save Changed!');
            }catch(Exception $e){
                return back()->with('error','Could not Updated!');
            }
        }
    }
}
