@extends('layouts.main')
@section('content')
<div class="container margin-top-20" style="margin-bottom:100px">

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
    <h2>My cart item</h2>
    @if(App\cart::totalItems()>0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total_price=0;
            @endphp
            @foreach(App\cart::totalCarts() as $cart)
            <tr>
                <td>
                    {{$loop->index + 1}}
                </td>
                <td><a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
                <td>
                 @if($cart->product->images->count()>0)
                 <img src="{{asset('images/food/'.$cart->product->images->first()->image)}}" width="100px" alt="">
                 @endif   
                </td>
                <td>
                    <form class="form-inline" action="{{route('carts.update', $cart->id)}}" method="post">
                        @csrf
                    <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                    <button type="submit" class="btn btn-success">Update</button>
                    </form>                  
                </td>
                <td>{{$cart->product->price}} Taka</td>
                @php
            $total_price+=$cart->product->price*$cart->product_quantity;
            @endphp
                <td>{{$cart->product->price*$cart->product_quantity}} Taka</td>
                <td>
                    <form class="form-inline" action="{{route('carts.delete', $cart->id)}}" method="post">
                        @csrf
                    <input type="hidden" name="cart_id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>                  
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td>Total Amount</td>
                
                <td colspan="1">           
                   <b>{{$total_price}} Taka</b> 
                </td>
                <td colspan="1"></td>
            </tr>
        </tbody>
    </table>
    <div class="float-right">
       <a href="{{route('products')}}" class="btn btn-primary btn-lg">Continue Shipping</a>
       @if($user=Auth::user())
       <a href="{{route('checkouts')}}" class="btn btn-primary btn-lg">Checkout</a>
       @else

      <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#login">Checkout</a>
     
     


        <!-- Login modal-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginl" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bg-warning text-center" id="login">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
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
		   <div class="form-group">
		   
		    <select name="role" id="role" class="form-control">
		    	<option value="">Select User Type</option>
		    	<option value="">Admin</option>
		    	<option value="">User</option>
		    </select>
		  </div>
		  <div class="form-group form-check">
       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
      </label>
		  </div>
		  <button type="submit" class="btn btn-outline-warning w-100">Login</button>
      <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                <a class="" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
       
      </div>
    
                               
    </div>
  </div>
</div>


<!------ Include the above in your HEAD tag ---------->

       @endif
    </div>
    @else
    <div class="alert alert-warning">
    <strong>There is no item in your cart.</strong>
    <br>
    <a href="{{route('products')}}" class="btn btn-primary btn-lg">Continue Shipping</a>
    </div>
    @endif
</div>

@endsection