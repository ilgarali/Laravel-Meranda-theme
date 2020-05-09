@extends('back.layouts.master')
@section('content')



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

    <a href="{{route('posts.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Add New Post</a>
    </div>

    <!-- Content Row -->
    <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
    <thead>
        <tr role="row">
    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" 
    aria-label="Name: activate to sort column descending" style="width: 222px;">Image</th>
    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
    aria-label="Position: activate to sort column ascending" style="width: 160px;">Title</th>
    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
    aria-label="Office: activate to sort column ascending" style="width: 150px;">Content</th>
    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
    aria-label="Age: activate to sort column ascending" style="width: 75px;">Category</th>
    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
    aria-label="Start date: activate to sort column ascending" style="width: 127px;">Action</th>
   </tr>
    </thead>
    
    <tbody>

        @foreach ($posts as $post)
            
      
    <tr role="row" class="odd">
    <td class="sorting_1"><img src="../{{$post->img}}" class="img-fluid"    alt=""></td>
        <td>{{$post->title}}</td>
        <td>{{Str::limit($post->content,100)}}</td>
        <td>{{$post->category->category}}</td>
        <td>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>

        </td>
  
        </tr>

        @endforeach
    </tbody>
    </table>
</div>
</div>
    <!-- Content Row -->


    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection