<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $posts = Post::paginate(7);
        return view('back.posts.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('back.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'required | image | max:2048'
        ]);
        $newpost = new Post();
        $newpost->title = $request->title;
       $newpost->slug = Str::slug($request->title);
        $newpost->category_id = $request->category;
        if ($request->editor) {
            $newpost->editor = $request->editor;
        }
        $newpost->read = $request->read;
        $newpost->content = $request->content;
        $newpost->user_id = Auth::id();

        if ($request->hasFile('img')) {
            $imgName = Str::slug($request->title) . "." . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('uploads/'),$imgName);
            $newpost->img = 'uploads/' . $imgName;
        }

        $newpost->save();
        return redirect()->route('posts.index')->with('success','You have successfully shared new post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
        $post = Post::findOrFail($id);
       
        $categories = Category::all();
        return view('back.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            
        ]);
        $newpost = Post::find($id);
        $newpost->title = $request->title;
       $newpost->slug = Str::slug($request->title);
        $newpost->category_id = $request->category;
         if ($request->editor) {
            $newpost->editor = $request->editor;
         }   
        $newpost->read = $request->read;
        $newpost->content = $request->content;

        if ($request->hasFile('img')) {
            $imgName = Str::slug($request->title) . "." . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('uploads/'),$imgName);
            $newpost->img = 'uploads/' . $imgName;
        }
       

        $newpost->save();
        return redirect()->route('posts.index')->with('success','You have successfully updated new post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (File::exists($post->img)) {
            File::delete(public_path('uploads/'.$post->img));
        } 
        $post->delete();
        return redirect()->route('posts.index')->with('success','You have successfully deleted new post');
    }
}
