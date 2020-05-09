
@extends('front.layouts.master')
@section('content')
    
    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 single-content">
            
            <p class="mb-5">
              <img src="{{asset($post->img)}}" alt="Image" class="img-fluid">
            </p>  
            <h1 class="mb-4">
              {{$post->title}}
            </h1>
            <div class="post-meta d-flex mb-5">
              <div class="bio-pic mr-3">
              <img src="{{asset('front/')}}/images/person_1.jpg" alt="Image" class="img-fluidid">
              </div>
              <div class="vcard">
              <span class="d-block"><a href="#">{{$post->name}}</a> in <a href="#">{{$post->category}}</a></span>
                <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> {{$post->read}} min read <span class="icon-star2"></span></span>
              </div>
            </div>

          <p> {{$post->content}} </p>
           

            <div class="pt-5">
                    <p>Categories:  <a href="#">{{$post->category}}</a></p>
                  </div>
      
      
                  <div class="pt-5">
                    <div class="section-title">
                      <h2 class="mb-5">{{count($comments)}} Comments</h2>
                    </div>
                    <ul class="comment-list">
                    
                      <li class="comment">

                        <ul class="children">
                          <li class="comment">
                          @foreach ($comments as $comment)
                              
                          <div class="vcard bio">
                          <img src="{{asset('front/')}}/images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                            <h3>{{$comment->name}}</h3>
                            <div class="meta">{{$comment->created_at}}</div>
                            <p>{{$comment->comment}}</p>
                          
                            </div>
                           
      
                            <ul class="children">
                              <li class="comment">
                            
                                 
                      
                              </li>
                            </ul>
                            @endforeach
                          </li>
                        </ul>
                      </li>
      
                    
                    </ul>
                    <!-- END comment-list -->
                    @if (session('message'))
                        {{session('message')}}
                    @endif

                    @guest
                        <h1>Please Login or Register to write a comment</h1>
                    <div class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </div>
                  @if (Route::has('register'))
                      <div class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </div>
                  @endif
                  @else
                    <div class="comment-form-wrap pt-5">
                      <div class="section-title">
                        <h2 class="mb-5">Leave a comment</h2>
                      </div>
                    <form action="{{route('comment')}}" class="p-5 bg-light" method="post">
                     @csrf
      
                        <div class="form-group">
                          <label for="message">Message</label>
                          <textarea  name="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                        <input type="hidden" name="postid" value="{{$post->postid}}">
                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                          <input type="submit" value="Post Comment" class="btn btn-primary py-3">
                        </div>
      
                      </form>
                    </div>
                    @endguest
                  </div>
          </div>


         

        </div>
        
      </div>
    </div>

    @endsection
