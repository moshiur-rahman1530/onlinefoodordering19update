<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','ONLINE FOOD ORDERING MANAGEMENT')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{asset('images/icon1.png')}}">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    @include('partials.stylesheet')
</head>
<body>
  

    <div class="container mt-5 mb-5" >
<div class="row justify-content-center">
<div class="col-md-5">
 <div class="card border border-primary" style="">
   <div class="card-header bg-warning text-center text-red" style="background-color: var(--light);"   >{{ __('Admin Login') }}</div>
 <div class="card-header text-center"><a href="{{url('/')}}">www.Online food order.com </a></div>
          
                <div class="card-body" style="">
                <form method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
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
      <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
        </form>
                
                   
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.scrept')
@yield('script')

</body>
</html>





