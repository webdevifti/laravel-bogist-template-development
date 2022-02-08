<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(Request $request){
        $request->validate([
            'post_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        try{
            $postID = Post::find($request->post_id);
            Comment::create([
                'name' => $request->name,
                'email' => $request->email,
                'comments' => $request->message,
                'post_id' => $request->post_id
            ]);
            return redirect('/post/'.$postID->slug.'#comments')->with('success_commented','Comment has been saved');
        }catch(Exception $e){
            return redirect('/post/'.$postID->slug.'#comments')->with('error_commented','Something happened wrong!');
        }
    }
    
}
