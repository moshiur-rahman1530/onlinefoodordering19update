
@extends('layouts.main')


@section('content')
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
<div class="container margin-top-20">
<div class="row">

<div class="col-md-12">
<div class="widget">

    
<h3>Food list for <span class="badge badge-info">{{$category->name}} Menu </span></h3>

@php
$products=$category->products()->paginate(20);
@endphp

@if($products->count()>0)

<div class="row">


    @foreach($products as $product)
     @if($product->status==1)
        <div class="col-md-3">
        <div class="card mb-2">
        
        @php  $i=1;  @endphp
        @foreach($product->images as $image)
        @if ($i>0)
        <a href="{{route('products.show',$product->slug)}}">
         <img class="card-img-top feature_img" src="{{asset('images/food/'.$image->image)}}" alt="{{$product->title}}">
         @endif
         @php  $i--;  @endphp
         @endforeach
         <div class="card-body">
        <h4 class="card-title"><a href="{{route('products.show',$product->slug)}}">{{$product->title}} <code style="font-size: 15px">{{$product->size}}</code></a></h4>
         <p class="card-text" style="color:red;font-weight: bold;">Price: {{$product->price}}Taka</p>
         @include('pages.product.partials.cart-button')
        </div>
     </div>
        </div>
          @endif
        @endforeach
        
    </div>
    <div class="mt-4 pagination">
{{$products->links()}}
</div>
@else
<div class="alert alert-warning">
<p>No product has been added in this category</p>
</div>
@endif

  



  
</div>
</div>
</div>
</div>
    
    </div>
    

@endsection