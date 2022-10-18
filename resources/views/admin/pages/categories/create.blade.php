@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Add Category
                    </div>
                <div class="card-body">
                    
    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Title ">
  </div>
 <span class="text-danger">{{$errors->first('name')}}</span>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea name="description" id="" cols="80" rows="8" class="form-control"></textarea>
  </div>
 <span class="text-danger">{{$errors->first('description')}}</span>

  {{--parent category--}}
  {{--<div class="form-group">
    <label for="exampleInputPassword1">Parent Category(optional)</label>
    <select name="parent_id" class="form-control">
    <option value="">Select parent category</option>
    @foreach($main_categories as $category)
<option value="{{$category->id}}">

{{$category->name}}
</option>

    @endforeach
    
    </select>
  </div>--}}
  

  
  <div class="form-group">
    <label for="image">Product Image</label>
    
        <input type="file" class="form-control" name="image" id="image" >
        </div>
    




  
  <button type="submit" class="btn btn-primary btn-sm">Add New Category</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


