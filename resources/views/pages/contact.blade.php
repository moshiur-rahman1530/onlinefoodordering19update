@extends('layouts.main')
@section('content')
<!-- Start Contact section -->
<section id="mu-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-contact-area">

            <div class="mu-title">
              
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
            <h4 class="mu-subtitle mt-4">Development of Online Food Ordering Management System for Bangla Restaura</h4>
              <h2 class="contactpage">Contact Us</h2>
            </div>

            <div class="mu-contact-content mt-5">
              <div class="row">

                <div class="col-md-6">
                  <div class="mu-contact-left">
                    <!-- Email message div -->
                    <div id="form-messages"></div>
                    <!-- Start contact form -->
                    <form class="form-horizontal" method="POST" action="{!! route('contact.store') !!}">
			{{ csrf_field() }} 
			<div class="form-group">
			<label for="Name">Name: </label>
			<input type="text" class="form-control" id="name" placeholder="Your name" name="name" required>
		</div>
    <span class="text-danger">{{$errors->first('name')}}</span>

		<div class="form-group">
			<label for="email">Email: </label>
			<input type="text" class="form-control" id="email" placeholder="john@example.com" name="email" required>
		</div>
    <span class="text-danger">{{$errors->first('email')}}</span>
		<div class="form-group">
			<label for="message">message: </label>
			<textarea type="text" class="form-control luna-message" id="message" placeholder="Type your messages here" name="message" required></textarea>
		</div>
     <span class="text-danger">{{$errors->first('message')}}</span>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" value="Send">Send</button>
			</div>
		</form>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mu-contact-right">
                    <div class="mu-contact-widget">
                      <h3>Office Address</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia temporibus corporis ea non consequatur porro corrupti hic voluptatibus assumenda, doloribus.</p>
                      <address>
                        <p><i class="fa fa-phone"></i>018-60340</p>
                        <p><i class="fa fa-envelope-o"></i>banglarestaura@gmail.com</p>
                        <p><i class="fa fa-map-marker"></i>Zilla school road, kandirpar, Comilla 3500</p>
                      </address>
                    </div>
                    <div class="mu-contact-widget">
                      <h3>Open Hours</h3>                      
                      <address>
                        <p><span>Opened Saturday-Friday</span> 10.00 am to 11 pm</p>

                      </address>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

<div class="container mb-4" style="margin-top:30px;">
<h1>Our Location</h1>
<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var Comilla= {
  center:new google.maps.LatLng(23.464981,91.182353),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),Comilla);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCURGZ8A2f1vvBZ0E9nRI1ImOTMvQnHo64&callback=myMap"></script>
</div>
          
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->

@endsection
