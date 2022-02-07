<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){
       
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('admin.post.posts',compact('posts'));
    }
    public function create(){
        $get_active_categories = Category::where('status','=',1)->get();
        return view('admin.post.add', compact('get_active_categories'));
    }

    public function edit($id){
        $get_active_categories = Category::where('status','=',1)->get();
        $post = Post::find($id);
        return view('admin.post.edit', compact('post','get_active_categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'post_category' => 'required|string',
            'post_title' => 'required|max:255|string',
            'article' => 'required',
        ]);
        if($request->post_thumbnail){
            $request->validate([
            'post_thumbnail' => 'mimes:jpg,png,jpeg'
            ]);
           
            $post = Post::findOrfail($id);
            $newImageName = uniqid().'_post_thumbnail_'.'.'.$request->post_thumbnail->extension();
            unlink(public_path('uploads/posts/'.$post->post_thumbnail));
            $request->post_thumbnail->move(public_path('uploads/posts/'), $newImageName);
            $slug = trim(strtolower(str_replace(' ','-', $request->post_title)));
            try{
                $post->category = $request->post_category;
                $post->title = $request->post_title;
                $post->slug = $slug;
                $post->post_thumbnail = $newImageName;
                $post->article = $request->article;
                $post->save();
          
                return back()->with('success','Post Updated Sucessfully!');
            }catch(Exception $e){
                return back()->with('error','Could not Updated!');
            }
        }else{
            $slug = trim(strtolower(str_replace(' ','-', $request->post_title)));
            try{
                $post = Post::findOrfail($id);
                $post->category = $request->post_category;
                $post->title = $request->post_title;
                $post->slug = $slug;
                $post->article = $request->article;
                $post->save();
          
                return back()->with('success','Post Updated Sucessfully!');
            }catch(Exception $e){
                return back()->with('error','Could not Updated!');
            }
        }
    }

    public function store(Request $request){
        $request->validate([
            'post_category' => 'required|string',
            'post_title' => 'required|max:255|string',
            'article' => 'required',
            'post_thumbnail' => 'required|mimes:jpg,png,jpeg'
        ]);
        try{
            $newImageName = uniqid().'_post_thumbnail_'.'.'.$request->post_thumbnail->extension();
            $slug = trim(strtolower(str_replace(' ','-', $request->post_title)));
            $user_id = Auth::id();
            Post::create([
                'title' => $request->post_title,
                'slug' => $slug,
                'post_thumbnail' => $newImageName,
                'article' => $request->article,
                'category' => $request->post_category,
                'posted_by' => $user_id
            ]);
            $request->post_thumbnail->move(public_path('uploads/posts/'), $newImageName);
            return back()->with('success', "Post has been published");
        }catch(Exception $e){
            return back()->with('error', "Something happened wrong!");
        }
    }
    public function changeStatus($id){
        $post = Post::select('status')->where('id','=',$id)->first();

        if($post->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Post::where('id',$id)->update($values);

        return back()->with('success',"Status Changed");
    }
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        try{
            $post->delete();
            unlink(public_path('uploads/posts/'.$post->post_thumbnail));
            return back()->with('success','Deleted');
        }catch(Exception $e){
            return back()->with('error','Could not Deleted!');
        }
    }
}
