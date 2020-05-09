<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($slug) {
        $category = Category::where('slug',$slug)->firstOrFail();
     
        $posts = Post::where('category_id',$category->id)->paginate(8);
        return view('front.category',compact('posts'));
    }
}
