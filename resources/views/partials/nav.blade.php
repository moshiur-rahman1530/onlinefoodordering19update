
<!-- Update Navbar -->
<div class="container-fluid">

<nav class="navbar navbar-expand-lg navbar-light " style="background: #f7f7f7;">
  <a class="navbar-brand" href="{{route('about')}}"><img src={{asset('images/brand.png')}} style="width: 100px;height: 50px"class="rounded-circle"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	
       <ul class="navbar-nav mr-auto ml-3"> 
          <li class="nav-item ml-5">
             <a class="nav-link ml-5" style="font-size:17px" href="{{route('index')}}">Home<span class="sr-only">(current)</span></a>
          </li>
         <li class="nav-item">
           <a class="nav-link mb-1" style="font-size:17px" href="{{route('about')}}">About <span class="sr-only">(current)</span></a>
        </li>
         <li class="nav-item">
           <a class="nav-link mr-1" style="font-size:17px" href="{{route('contact')}}">Contact Us<span class="sr-only">(current)</span></a>
         </li>
      </ul>
    <form class="form-inline my-2 my-lg-0 mr-5 ml-5" action="{!! route('product.search') !!}" method="get">
     <div class="input-group">
      <input type="text" class="form-control" name="search" placeholder="Search for products" size="60">
     <div class="input-group-append">
      <button class="btn btn-outline-secondary search-icon-button" type="submit"><i class="fas fa-search"></i></button>
    </div>
    </div>
     </form>
     <ul class="navbar-nav ml-auto">
       <!-- Dropdown -->
       @if(Auth::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown"  data-toggle="dropdown" aria-haspopup="true">
         <i class="fas fa-bell fa-lg text-danger"><span class="badge badge-danger">
         @if(Auth::check())
        {{ Auth::user()->unreadNotifications->count()}}
         @endif
           
        </span></i>
         </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
         @if(Auth::check())
          @foreach(Auth::user()->unreadNotifications as $item)
                <a style="background-color: lightgray" class="dropdown-item"href="{{$item?url($item->data['link']):'#'}}">
                 {{$item->data['message']}} 
                 {{$item->markAsRead()}} 
                </a>
               
            @endforeach                 
          @endif
        </div>
      </li>
      @endif
    
      <li class="nav-item">
        <a class="nav-link" style="font-size:20px" href="{{route('carts')}}"><i class="fas fa-shopping-cart text-warning"><span class="badge badge-info">{{App\cart::totalItems()}}</span></i></a>
      </li>
     
      
      @guest
      <li class="nav-item pr-3">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#login"><i class="fas fa-sign-in-alt fa-2x text-warning"></i></a>
      </li>
                        @else
                            <li class="nav-item dropdown" style="list-style: none;">
                           
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" 
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a href="#" class="dropdown-item">
                                    Notifications
                                  </a>

                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        {{ __('My Dashboard') }}
                                  </a>
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                  
      
    </ul>
    </div>
</nav>
</div>





   <!-- Login modal-->
<div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="loginl" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content border border-primary">
      <div class="modal-header bg-warning text-center">
        <h5 class="modal-title text-center" id="login">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
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
        <div class="form-group">
		    <label for="email">Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
        <span class="text-warning">{{$errors->first(('email'))}}</span>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="Password">Password</label>
		    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
		  </div>
		   
		  <!-- <div class="form-group form-check">
       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
      </label>
		  </div> -->
		  <button type="submit" class="btn btn-outline-warning w-100">Login</button>
      <a href="{{ route('password.request') }}"class="my-2 float-left text-red">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                <a href="{{ route('register') }}"class="my-2 float-right text-red">{{ __('Sign Up') }}</a>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
       
      </div>
    
                               
    </div>
  </div>
 </div>


<!------ Include the above in your HEAD tag ---------->
 


