@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                    Edit Food Brand
                    </div>
                <div class="card-body">
                    
                <form action="{{route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable fade show"role="alert">
<strong>{{Session('success')}}!</strong>
    <button type="button"class="close"data-dismiss="alert"aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if(Session::has('error'))
<div class="alert alert-success alert-dismissable fade show"role="alert">
<strong>{{Session('error')}}!</strong>
    <button type="button"class="close"data-dismiss="alert"aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$brand->name}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Description(optional)</label>
    <textarea name="description" id="" cols="80" rows="8" class="form-control">{!!$brand->description!!}</textarea>
  </div>

  
  
  <div class="form-group">
    <label for="image">Brand Old Image</label><br>
    <img src="{!!asset('images/brands/'.$brand->image)!!}" width="100"><br>
    <label for="image">Brand New Image(optional))</label>
        <input type="file" class="form-control" name="image" id="image" >
        </div>
    




  
  <button type="submit" class="btn btn-primary btn-sm">Add New brand</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


