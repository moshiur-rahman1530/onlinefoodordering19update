@extends('layouts.main')
@section('content')
<div id="about" class="light-wrapper mt-5">
        <section class="ss-style-top"></section>
        <div class="container inner">
            <p style="text-align:center"><img src="{{asset('images/Capture.PNG')}}"width="100%" height="350px"></p>
            <p class="lead main text-center"style="color: blue; font-size: 40px">About Us for Bangla Restaura</p>
            <p class="lead main text-center"style="color: blue; font-size: 40px">We're cooking delecious foods since 2002</p>
            <div class="row text-center about">
                <div class="col-sm-4 mt-4">
                    <div class="col-wrapper">
                        <div class="icon-wrapper"> <i class="fa fa-anchor"></i> </div>
                        <h3>EST. 2002n</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
                <div class="col-sm-4 mt-4">
                    <div class="col-wrapper">
                        <div class="icon-wrapper"> <i class="fa  fa-cutlery"></i> </div>
                        <h3>Cooking Traditions</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                    </div>
                </div>
                <div class="col-sm-4 mt-4">
                    <div class="col-wrapper">
                        <div class="icon-wrapper"> <i class="fa fa-coffee"></i> </div>
                        <h3>Food Quality</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>
            </div>
            <!-- /.services --> 
        </div>
        <!-- /.container -->
        <section class="ss-style-bottom"></section>
    </div><!-- #about -->
@endsection


