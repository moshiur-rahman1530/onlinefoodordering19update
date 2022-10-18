@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            
            <!-- Page Title Header Ends-->
          
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-home fa-lg"></i>
                </div>
                <div class="mr-5"><h4>Visit Home Page</h4></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{!!route('index')!!}">
                <span class="float-left">Go to</span>
                <span class="float-right">
                  <i class="fas fa-angle-right fa-lg"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list fa-lg"></i>
                </div>
                <div class="mr-5"><h4>All orders</h4><h4>{{$orders->count()}}</h4> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('admin.allorder')}}">
                <span class="float-left">View details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right fa-lg"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><h4>Active Product</h4>
                  <h4>{{$products->count()}}</h4></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('admin.active.product')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <h4>Inactive Product</h4>
                  <h3>{{$new_products->count()}}</h3>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('admin.inactive.product')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <div class="mr-5"><h4>ALL Users</h4>
             
                  <h4>{{$users->count()}}</h4>
                
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.manage_users')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

<div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-map-marker "></i>
                </div>
                <div class="mr-5"><h4>ALL Areas</h4>
             
                  <h4>{{$divisions->count()}}</h4>
                
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.divisions')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>


           <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <h4>All categories</h4>
               
                  <h3>{{$categories->count()}}</h3>

                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('admin.categories')}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

        </div>

          
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
@endsection


