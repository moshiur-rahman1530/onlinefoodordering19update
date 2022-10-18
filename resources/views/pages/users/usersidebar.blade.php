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
 



<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-2"id="sidebaru">
			
			

 <ul class="sidebaru navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.dashboard')}}"class="list-group-item {{Route::is('user.dashboard')? 'active':''}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="{{route('user.profile')}}"class="list-group-item {{Route::is('user.profile')? 'active':''}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Update Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.view')}}"class="list-group-item {{Route::is('user.view')? 'active':''}}">
          <i class="fas fa-fw fa-table"></i>
          <span>All Order History</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.lastproduct')}}"class="list-group-item {{Route::is('user.lastproduct')? 'active':''}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Recent Order History</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"class="list-group-item" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-fw fa-edit"></i>
          <span>Account</span></a>
      </li>
      <!-- Button trigger modal -->


<!-- Modal --><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Create New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('user.account.create')}}" method="POST">
        @csrf
  <div class="form-group">
    <label for="account">Account Number</label>
    <input type="text" class="form-control" name="account_number"id="account" placeholder="Enter Account Number">
   </div>
   <span class="text-danger">{{$errors->first('account_number')}}</span>

  <div class="form-group">
    <label for="pin">Pin</label>
    <input type="password" class="form-control" id="pin" name="pin"placeholder="Pin Number">
  </div>
   <span class="text-danger">{{$errors->first('pin')}}</span>
   <div class="form-group">
    <label for="balance">Balance</label>
    <input type="number" class="form-control" name="balance" id="balance" placeholder="Balance">
  </div>
   <span class="text-danger">{{$errors->first('balance')}}</span>
 
  <button type="submit" class="btn btn-outline-warning w-100">Create</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
         
                Notifications<span class="badge badge-danger">{{Auth::user()->unreadNotifications->count()}}</span>
             

        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          @foreach(Auth::user()->unreadNotifications as $item)
                <a style="background-color: lightgray" class="dropdown-item py-3 border-bottom"href="{{$item?url($item->data['link']):'#'}}">
                 {{$item->data['message']}} 
                </a>
                $item->markAsRead()
                 @endforeach                 

        </div>
      </li>
    </ul>

		</div>
		     <div class="col-md-10">
               <div class="card card-body">
                 @yield('sub-content')

          
              </div>
             </div>
	</div>

</div>

@endsection

                                    