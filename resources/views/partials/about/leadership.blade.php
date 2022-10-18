
@extends('layouts.main')
@section('content')
<div id="leadership" class="light-wrapper m-3">
        <section class="ss-style-top"></section>
        <div class="container inner">
        <div class="leadership">
        <h2 class="leader" style="">Leadership Team</h2>
       </div>
    <h4>Ray Kroc left a legacy. Our executives preserve it.</h4>
  <p>Bangla Restaura comilla leadership team draws from a proud history and set of
       values that made the company an icon of bangladesh business. Meet our President
        and CEO, as well as other Bangla Restaura executive team members who continue 
        to build our legacy and ensure our Golden Arches shine bright.</p>

        <div class="row">
            <div class="col-md-4">
            <div class="container">
            <div class="card">
    <img class="card-img-top" src="{{asset('images/download.png')}}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <h6>Bangla Restaura President and CEO</h6>
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">More Details</button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
   
        </div>
           </div>
      </div>
      </div>
      
      
      <div class="col-md-4">
      <div class="container">
            <div class="card">
    <img class="card-img-top" src="{{asset('images/download.png')}}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <h6>Vice President</h6>
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo1">More Details</button>
  <div id="demo1" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
   
        </div>
           </div>
      </div>
      </div>

      
      <div class="col-md-4">
      <div class="container">
            <div class="card">
    <img class="card-img-top" src="{{asset('images/download.png')}}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <h6>Chief Marketing Officer</h6>
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">More Details</button>
  <div id="demo2" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
   
        </div>
           </div>
      </div>
      </div>

  </div>
            
            <!-- /.services --> 
        </div>
        <!-- /.container -->
        <section class="ss-style-bottom"></section>
    </div><!-- #leadership -->
@endsection





