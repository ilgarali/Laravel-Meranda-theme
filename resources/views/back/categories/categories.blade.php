@extends('back.layouts.master')
@section('toastr-css')
<link href="{{asset('back')}}/css/toastr.css" rel="stylesheet">
@endsection
@section('content')



<!-- Begin Page Content -->
<div class="container-fluid">
    @if (session('success'))
        

    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
        <form  method="post" action="{{route('categories.store')}}">
            @csrf
                <div class="form-group">
                    <label for="">Add New Category</label>
                    <input type="text" name="category" class="form-control" required>
                    <button type="submit" class="btn btn-primary my-2 btn-block">Add</button>

                </div>
            </form>
        </div>
        <div class="col-md-6">
            <table class="my-3">
                <thead class="my-2">
                    <tr>
                        <th >Categories</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="my-1">  
                        <td>
                          
                         <h5 class="{{$category->id}}"> {{$category->category}}</h5> 
                          
                        </td>
                    <td>
                    <button class="btn btn-success edit" id="{{$category->id}}" >Edit</button> 
                 <form style="display:inline" action="{{route('categories.destroy',$category->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                   
                    <button class="btn btn-warning delete" >Delete</button> 
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

<div style="hidden" id="csrf">
    @csrf

</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

@section('toastr-js')
<script src="{{asset('back/')}}/js/toastr.js"></script>
@endsection

@section('js')

<script>
let getedit = document.querySelectorAll('.edit');
for (let i = 0; i < getedit.length; i++) {
    getedit[i].addEventListener('click', (e) => {
        e.preventDefault();
        let getid =  getedit[i].getAttribute('id');
        let gettext = document.getElementsByClassName(getid)[0].innerText;
    
        
        
     
        let setinput = document.getElementsByClassName(getid)[0].innerHTML=`
        <input type="text" name="category" class="form-control newtext" placeholder='${gettext}'>
        `;

      
        getedit[i].setAttribute('class','btn btn-primary confirm');
        getedit[i].innerText = 'Confirm';
        
        let confirm = document.querySelectorAll('.confirm');
        let newtext = document.querySelectorAll('.newtext');
        for (let j = 0; j < confirm.length; j++) {
            confirm[j].addEventListener('click',(e) => {
                e.preventDefault();
                let newvalue = newtext[j].value;
                
                const phpadd = "{{route('admin.categoryfetch')}}";
             
                let formData = new FormData;
                let token = document.getElementById('csrf').childNodes[1].value;
                
                
              
                formData.append('newvalue',newvalue);
                formData.append('id',getid);
                fetch(phpadd,{
                    headers: {
                    "X-CSRF-TOKEN": token
                    },
                    method:"post",
                    body:formData
                }).then((res) => res.json())
                .then((res) => myfunc(res))
                .catch((error) => console.log(error))
                
                function myfunc(res) {
                    if(res.success)
                {
                    let getparent = document.getElementsByClassName(getid)[j].childNodes[1].remove();
                    
                    let setvalue = document.getElementsByClassName(getid)[j].innerHTML  = `<h5>${newvalue}</h5>`;
                    toastr.success('You Have Edited Category Successfully', 'Success')
                    getedit[i].setAttribute('class','btn btn-success edit');
                    getedit[i].innerText = 'Edit';
                    
                }
                }
               
                
               
                
            })
            
        }
        
        
    })
    
}




</script>

@endsection