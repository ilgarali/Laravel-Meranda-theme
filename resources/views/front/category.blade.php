@extends('front.layouts.master')
@section('content')

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            @if ($posts->count() > 0)
                
         
            @foreach ($posts as $post)
            <div class="section-title">
              <span class="caption d-block small">posts</span>
            <h2>{{$post->post}}</h2>
            </div>

       
                
       
            <div class="post-entry-2 d-flex">
            <div class="thumbnail order-md-2" style="background-image: url('{{$post->img}}')"></div>
              <div class="contents order-md-1 pl-0">
                <h2><a href="{{route('single',[$post->category->slug,$post->slug])}}">{{$post->title}}</a></h2>
                <p class="mb-3">{{$post->content}}</p>
                <div class="post-meta">
                <span class="d-block"><a href="{{route('single',[$post->category->slug,$post->slug])}}">Dave Rogers</a> in <a href="{{route('category',$post->category->slug)}}">{{$post->category->category}}</a></span>
                  <span class="date-read">{{$post->created_at}} <span class="mx-1">&bullet;</span> {{$post->read}} min read <span class="icon-star2"></span></span>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-warning">
              No Post Found
            </div>
            @endif

          </div>
        
        </div>

        <div class="row">
          <div class="col-lg-6">
          {{$posts->links()}}
          </div>
        </div>
      </div>
    </div>

   

    @endsection
