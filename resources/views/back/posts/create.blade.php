@extends('back.layouts.master')
@section('content')



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Add New Post</a>
    </div>

    <!-- Content Row -->
    <div class="row"><div class="col-sm-12">
        
        <form method="POST"  action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category" >
                      @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                      @endforeach
                    </select>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="img" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tick it if you want it in Editor Choice </label>
                      <input type="radio" name="editor" value="1" >
                    </div>

                    <div class="form-group">
                        <label for="">Read Time Only Number</label>
                       <input type="text" name="read" placeholder="Write Number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                       <textarea class="form-control" name="content"  id="summernote" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                    </div>
                </div>
            </form>
    </div>
</div>
    <!-- Content Row -->


    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection