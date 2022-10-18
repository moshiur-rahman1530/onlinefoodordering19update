
@extends('layouts.main')


@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container margin-top-20'>
    
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
    <div class="row">
      <div class="col-md-12">
        <div class="widget">
          <h3> Searched Products For - <span class="badge badge-primary">{{ $search }}</span></h3>
          @include('pages.product.index')
          
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection