@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                    Edit Food item
                    </div>
                <div class="card-body">
                    
    <form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{$product->title}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea name="description" id="" cols="80" rows="8" class="form-control">{{$product->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$product->price}}" >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Size</label>
    <input type="text" class="form-control" name="size" id="exampleInputEmail1" value="{{$product->size}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Select Category</label>
    <select name="category_id" class="form-control">
    <option value="">Please select category</option>
    @foreach(App\category::orderBy('name','asc')->where('parent_id',null)->get() as $parent)
    <option value="{{$parent->id}}"{{$parent->id==$product->category->id?'selected':''}}>{{$parent->name}}</option>
    @foreach(App\category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
    <option value="{{$child->id}}"{{$child->id==$product->category->id?'selected':''}}>-->{{$child->name}}</option>
    @endforeach
    @endforeach
    </select>
  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1">Select Brand</label>
    <select name="brand_id" class="form-control">
    <option value="">Please select a Brand</option>
     @foreach (App\brand::orderBy('name', 'asc')->get() as $br)
     <option value="{{ $br->id }}" {{ $br->id == $product->brand_id ? 'selected' : '' }}>{{ $br->name }}</option>
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


  
  <button type="submit" class="btn btn-primary btn-sm">Update Item</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


