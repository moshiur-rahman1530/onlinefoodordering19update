@extends('admin.layouts.main')
@section('content')


<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header" style="width: 18rem;">
                        Admin Profile
                    </div>
                <div class="card-body">
                   
                <p class="card-text">Welcome {{$user->name}} </p>
                <p class="card-text">{{$user->avatar}} </p>
    <p class="card-text">Email: {{$user->email}}</p>
    <p class="card-text">Phone: {{$user->phone_no}}</p>
    <p class="card-text">Admin Type: {{$user->type}}</p>

  </div>
  </div>
  </div>
  </div>

@endsection

