<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function single($category,$slug) {
        $category = Category::where('slug',$category)->first() ?? abort(403,'Not found');
       
        $post =Post::select(['*','posts.id as postid'])->where('posts.slug',$slug)->where('posts.category_id',$category->id)
        ->leftJoin('categories','posts.category_id','=','categories.id')
        ->leftJoin('users','posts.user_id','=','users.id')
        ->firstOrFail();
       
         $comments = Comment::where('comments.post_id',$post->postid)
         ->leftJoin('users','comments.user_id','=','users.id')
         ->get();
        
        $post->increment('hit');
        return view('front.single',compact('post','comments'));
    }
}
