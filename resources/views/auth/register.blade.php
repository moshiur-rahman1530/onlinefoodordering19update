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
<div class="container mt-2 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-primary">
                <div class="card-header text-center bg-dark text-white">{{ __('Register') }}</div>

                

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Lirst Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" required>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                            <div class="col-md-6">
                                <select name="division_id" class="form-control" id="shipping_id">
                                <option value="">please select your Shipping Address</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                                @endforeach
                                </select>  
                                  @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('division_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                        <div class="form-group row">
                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">{{ __('Permanent Address') }}</label>

                            <div class="col-md-6">
                                <input id="permanent_address" type="permanent_address" class="form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" name="permanent_address" value="{{ old('permanent_address') }}" required>

                                @if ($errors->has('permanent_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('permanent_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Register') }}
                                </button>
                                <button class="btn btn-primary" type="button" onclick="reloadPage();">Reset</button>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
  function validation()
  {
    let first_name=document.getElementById('first_name').value;
    let last_name=document.getElementById('last_name').value;
    let email=document.getElementById('email').value;
    let password=document.getElementById('password').value; 
    let shipping=document.getElementById('shipping_address').value;
    let phone=document.getElementById('phone').value;
    let address=document.getElementById('permanent_address').value; 
      
    let password_check=/^(?=.*[0-9])(?=.*[A-Za-z])[A-Za-z .,@$&*0-9]{8,16}$/;
    let name_check=/^[A-Za-z .:]{3,60}$/;
    let email_check=/[a-z0-9.-_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
    let phone_check=/01[3-9]{1}[0-9]{2}[0-9]{6}$/;
    let address_check=/[a-zA-Z-: 0-9,.]/
   
    if(name_check.test(first_name))
    {
      document.getElementById('first_name').innerHTML='';
    }else{
       document.getElementById('first_name').innerHTML='Invalid Name!!!';
       return false;
    }
    if(email_check.test(email))
    {
      document.getElementById('email_error').innerHTML='';
    }else{
       document.getElementById('email_error').innerHTML='Invalid Email!!!';
       return false;
    }
     if(password_check.test(password))
    {
      document.getElementById('password_error').innerHTML='';
    }else{
       document.getElementById('password_error').innerHTML='At least 8 characters Contain number';
       return false;
    }
    if(phone_check.test(phone))
    {
      document.getElementById('phone_error').innerHTML='';
    }else{
       document.getElementById('phone_error').innerHTML='Invalid Format input correct mobile no:!!!';
       return false;
    }
    if(address_check.test(permanent_address))
    {
      document.getElementById('permanent_address').innerHTML='';
    }else{
       document.getElementById('permanent_address').innerHTML='Invalid address!!!';
       return false;
    }
    return true;


  }
</script>

<script>
    function reloadPage(){
        location.reload(true);
    }
</script>

@endsection

