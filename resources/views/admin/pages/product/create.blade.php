@extends('admin.layouts.main')
@section('content')


<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Add New Item
                    </div>
                <div class="card-body">
                    
    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
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
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Food Title ">
  </div>  
  <span class="text-danger">{{$errors->first('title')}}</span>

  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea name="description" id="" cols="80" rows="8" class="form-control"></textarea>
  </div>
    <span class="text-danger">{{$errors->first('description')}}</span>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Food Title ">
  </div>
    <span class="text-danger">{{$errors->first('price')}}</span>

  <div class="form-group">
    <label for="exampleInputEmail1">Size</label>
    <input type="text" class="form-control" name="size" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Food size ">
  </div>
 
  <div class="form-group">
    <label for="exampleInputEmail1">Select Category</label>
    <select name="category_id" class="form-control">
    <option value="">Please select category</option>
    @foreach(App\category::orderBy('name','asc')->where('parent_id',null)->get() as $parent)
    <option value="{{$parent->id}}">{{$parent->name}}</option>
    @foreach(App\category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
    <option value="{{$child->id}}">-->{{$child->name}}</option>
    @endforeach
    @endforeach
    </select>
  </div>
    <span class="text-danger">{{$errors->first('category_id')}}</span>

  
  <div class="form-group">
    <label for="exampleInputEmail1">Select Brand</label>
    <select name="brand_id" class="form-control">
    <option value="">Please select Brand</option>
    @foreach(App\brand::orderBy('name','asc')->get() as $brand)
    <option value="{{$brand->id}}">{{$brand->name}}</option>
    @endforeach
    </select>
  </div>
 


  <div class="form-group">
    <label for="product_image">Product Image</label>
    <div class="row">
        <div class="col-md-3">
        <input type="file" class="form-control" name="product_image[]" id="product_image" >
        </div>
    
    
        <div class="col-md-3">
        <input type="file" class="form-control" name="product_image[]" id="product_image" >
        </div>
   
    
        <div class="col-md-3">
        <input type="file" class="form-control" name="product_image[]" id="product_image" >
        
    </div>
    
        <div class="col-md-3">
        <input type="file" class="form-control" name="product_image[]" id="product_image" >
        </div>
</div>


  </div>


  
  <button type="submit" class="btn btn-primary btn-sm">Add New Product</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


