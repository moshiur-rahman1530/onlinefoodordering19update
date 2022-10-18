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
<div class="wraper">
<div class="alert alert-success alert-dismissable fade show"role="alert">
<strong>{{Session('error')}}!</strong>
    <button type="button"class="close"data-dismiss="alert"aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container-fluid">
<div class="row">
<div class="col-md-2 mt-2" id="sidebar">
      @include('partials.sidebar')
</div>
<div class="col-md-10 mt-2">
     <div class="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">

            @foreach ($sliders as $slider)
             <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index}}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
            @endforeach

          </ol>
          <div class="carousel-inner">

            @foreach ($sliders as $slider)
              <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                <img class="d-block w-100"style="height:550px" src="{{ asset('images/sliders/'.$slider->image) }}" alt="{{ $slider->title }}" style="height: 450px;" />

                <div class="carousel-caption d-none d-md-block">
                  <h5>{{ $slider->title }}</h5>
                  
                  @if ($slider->button_text)
                    <p>
                      <a href="{{ $slider->button_link }}"  class="btn btn-danger">{{ $slider->button_text }}</a>
                    </p>
                  @endif

                </div>
            </div>
            @endforeach
            

          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

</div>
</div>
</div>


    <div class="container margin-top-20">
    
<div class="row">

<div class="col-md-12">
<h1 class="text-center">All Food Items</h1>
<hr style=" display: block; height: 2px; color: red;">
<div class="widget">
    <div class="row mb-4 mt-4">
    
    @foreach($products as $product)
    
        <div class="col-md-3 col-6">
        <div class="card mb-4">
        
        @php  $i=1;  @endphp
        @foreach($product->images as $image)
        @if ($i>0)
        <a href="{{route('products.show',$product->slug)}}">
         <img class="card-img-top feature_img" src="{{asset('images/food/'.$image->image)}}" alt="{{$product->title}}">
         @endif
         @php  $i--;  @endphp
         @endforeach
         <div class="card-body">
         <h4 class="card-title"><a href="{{route('products.show',$product->slug)}}">{{$product->title}} <code style="font-size: 15px">{{$product->size}}</code> </a></h4>
         <p class="card-text mb" style="color:red;font-weight: bold;">Price: {{$product->price}}Taka</p>
         @include('pages.product.partials.cart-button')
        </div>
     </div>
        </div>
       
        @endforeach
        
    </div>
    <div class="mt-4 pagination">
{{$products->links()}}
</div>
</div>
</div>
</div>
</div>
    
    </div>
    </div>
    
    

@endsection


