<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Exception;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    //
    public function index(){
        $social_media = Social::orderBy('created_at','DESC')->get();
        $icons =  fa_icons();
        return view('admin.social.index',compact('icons','social_media'));
    }
    public function store(Request $request){
        $request->validate([
            'social_icon' => 'required|string|max:255',
            'social_url' => 'required|string|max:255'
        ]);

        try{
            Social::create([
                'icon_class' => $request->social_icon,
                'social_url' => $request->social_url
            ]);
            return back()->with('success', 'Social Media added');
        }catch(Exception $e){
            return back()->with('error', 'Something wrong!');
        }
    }

    public function edit($id){
        $get_social_item = Social::findOrFail($id);
        $icons =  fa_icons();
        return view('admin.social.edit', compact('get_social_item','icons'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'social_icon' => 'required|string|max:255',
            'social_url' => 'required|string|max:255'
        ]);

        $social = Social::findOrFail($id);
        try{
            $social->icon_class = $request->social_icon;
            $social->social_url = $request->social_url;
            $social->save();
            return back()->with('success', 'Social Media Updated');
        }catch(Exception $e){
            return back()->with('error', 'Something wrong!');
        }
    }
    public function destroy($id){
        $social = Social::findOrFail($id);
        try{
           $social->delete();
            return back()->with('success', 'Social Media Deleted');
        }catch(Exception $e){
            return back()->with('error', 'Something wrong!');
        }
    }
    public function changeStatus($id){
        $post = Social::select('status')->where('id','=',$id)->first();

        if($post->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Social::where('id',$id)->update($values);

        return back()->with('success',"Status Changed");
    }
}
