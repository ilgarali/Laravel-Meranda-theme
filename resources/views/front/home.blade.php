@extends('front.layouts.master')
@section('content')
    

    <div class="site-section py-0">
      <div class="owl-carousel hero-slide owl-style">

        @foreach ($editor as $editor)
            

        <div class="site-section">
          <div class="container">
            <div class="half-post-entry d-block d-lg-flex bg-light">
              <div class="img-bg" style="background-image: url('{{$editor->img}}')"></div>
              <div class="contents">
                <span class="caption">Editor's Pick</span>
             
              <h2><a href="{{route('single',[$editor->category->slug,$editor->slug] )}}">{{$editor->title}}</a></h2>
                <p class="mb-3">{{Str::limit($editor->content,550)}} </p>
                
                <div class="post-meta">
                <span class="d-block"><a href="#">{{$editor->name}}</a> in <a href="#">{{$editor->category->category}}</a></span>
                  <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                </div>

              </div>
            </div>
          </div>
        </div>
        @endforeach

        


      </div>
    </div>
  

    


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-title">
              <h2>Tv-series</h2>
            </div>

            @foreach ($politics as $politic)
                
            
            <div class="post-entry-2 d-flex">
              <div class="thumbnail" style="background-image: url('{{$politic->img}}')"></div>
              <div class="contents">
                <h2><a href="{{route('single',[$politic->category->slug,$politic->slug] )}}">{{$politic->title}}</a></h2>
                <p class="mb-3">{{Str::limit($politic->content,330)}}</p>
                <div class="post-meta">
                <span class="d-block"><a href="#">{{$politic->name}}</a> in <a href="#">{{$politic->category->category}}</a></span>
                  <span class="date-read">{{$politic->created_at}}<span class="mx-1">&bullet;</span> {{$politic->read}} min read <span class="icon-star2"></span></span>
                </div>
              </div>
            </div>
            @endforeach
          
          </div>
          <div class="col-lg-6">
            <div class="section-title">
              <h2>Stars</h2>
            </div>

            @foreach ($business as $business)
                

            <div class="post-entry-2 d-flex">
              <div class="thumbnail" style="background-image: url('{{$business->img}}')"></div>
              <div class="contents">
                <h2><a href="{{route('single',[$business->category->slug,$business->slug] )}}">{{$business->title}}</a></h2>
              <p class="mb-3">{{Str::limit($business->content,330)}}</p>
                <div class="post-meta">
                <span class="d-block"><a href="#">{{$business->name}}</a> in <a href="#">{{$business->category->category}}</a></span>
                  <span class="date-read">{{$business->created_at}} <span class="mx-1">&bullet;</span> {{$business->read}} min read <span class="icon-star2"></span></span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Recent News</h2>
            </div>
            @foreach ($allposts  as $post )
            <div class="post-entry-2 d-flex">
              <div class="thumbnail order-md-2" style="background-image: url('{{$post->img}}')"></div>
              <div class="contents order-md-1 pl-0">
              <h2><a href="{{route('single',[$post->category->slug,$post->slug] )}}"> {{$post->title}} </a></h2>
                <p class="mb-3">{{Str::limit($post->content,330)}}</p>
                <div class="post-meta">
                <span class="d-block"><a href="#">{{$post->name}}</a> in <a href="#">{{$post->category->category}}</a></span>
                  <span class="date-read"> {{$post->created_at}} <span class="mx-1">&bullet;</span> {{$post->read}} min read <span class="icon-star2"></span></span>
                </div>
              </div>
            </div>

            @endforeach

          </div>
    
        </div>

        <div class="row">
          <div class="col-lg-6">
            
            
             {{$allposts->links()}}
         
          </div>
        </div>
      </div>
    </div>

    @endsection
