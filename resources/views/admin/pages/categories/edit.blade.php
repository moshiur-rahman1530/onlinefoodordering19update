@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                    Edit Food Category
                    </div>
                <div class="card-body">
                    
                <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$category->name}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Description(optional)</label>
    <textarea name="description" id="" cols="80" rows="8" class="form-control">{!!$category->description!!}</textarea>
  </div>


  {{--parent id adding--}}
  {{--<div class="form-group">
    <label for="exampleInputPassword1">Parent Category(optional)</label>
    <select name="parent_id" class="form-control">
    <option value="">Select primary category</option>
    @foreach($main_categories as $cat)
<option value="{{$cat->id}}"{{$cat->id==$category->parent_id ? 'selected':''}}">

{{$cat->name}}
</option>

    @endforeach
    
    </select>
  </div>--}}
  
  <div class="form-group">
    <label for="image">Product Old Image</label><br>
    <img src="{!!asset('images/categories/'.$category->image)!!}" width="100"><br>
    <label for="image">Product New Image(optional))</label>
        <input type="file" class="form-control" name="image" id="image" >
        </div>
    




  
  <button type="submit" class="btn btn-primary btn-sm">Update Category</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


