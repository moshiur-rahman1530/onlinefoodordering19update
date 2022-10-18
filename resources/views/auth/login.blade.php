@extends('layouts.main')

 
 @section('content')
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-md-5">
 <div class="card border border-primary" style="">
   <div class="card-header bg-warning text-center text-blue">{{ __('Login') }}</div>
 <div class="card-header text-center"><a href="{{url('/')}}">www.Online food order.com </a></div>
          
                <div class="card-body" style="">
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
       
     <!--  <div class="form-group form-check">
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
            </div>
        </div>
    </div>
</div>


@endsection