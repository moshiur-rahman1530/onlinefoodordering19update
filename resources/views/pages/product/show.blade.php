
@extends('layouts.main')


@section('title')
{{$product->title}}|ONLINE FOOD ORDERING MANAGEMENT
@endsection

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


     <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @php $i = 1; @endphp
            @foreach ($product->images as $image)
            
              <div class="product-item carousel-item {{ $i == 1 ? 'active':'' }}">
                <img class="d-block w-100" src="{{asset('images/food/'.$image->image)}}" alt="First slide">
              </div>
              @php $i++; @endphp
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a  class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon " aria-hidden="true"></span>
            <span class="sr-only"style="">Next</span>
          </a>
        </div>

        <div class="">
          
          <p>Category <span class="badge badge-info">{{ $product->category->name }}</span></p>
          @if($product->brand_id)
          <p>Category <span class="badge badge-info">{{ $product->brand->name }} </span></p>
          @endif

        </div>

      </div>

      <div class="col-md-8">
        <div class="widget">
          <h3> {{ $product->title }}</h3>
           <h3> {{ $product->size }}</h3>
          <h3> {{ $product->price }} Taka
            <span class="badge badge-primary">
              <h4>You Can buy now</h4>
            </span>
          </h3>
          <hr>

          <div class="product-description">
            {!! $product->description !!}
          </div>
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>
    

@endsection