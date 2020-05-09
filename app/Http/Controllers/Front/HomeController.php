<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Comment;

class HomeController extends Controller
{
 
   public function index(){
     $editor = Post::where('editor',1)->latest()->take(2)->get();
     $politics = Post::where('category_id',1)->latest()->take(4)->get();
     $business = Post::where('category_id',2)->latest()->take(4)->get();
     $allposts = Post::latest()->paginate(8);
    return view('front.home',compact('editor','politics','business','allposts'));
   }




 

 



}
