<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentPost(Request $request) {
        
        $request->validate([
        'message' => 'required | min:5 | max:999 ',
        ]);
        $comment = new Comment();
        $comment->comment = $request->message;
        $comment->post_id = $request->postid;
        $comment->user_id = $request->userid;
        $comment->save();

        return redirect()->back()->with('message','You posted comment successfully');
        

    }

}
