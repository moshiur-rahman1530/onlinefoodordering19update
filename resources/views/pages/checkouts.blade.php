@extends('layouts.main')
@section('content')
<div class="container margin-top-20 mb-4">
  
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
   <div class="card card-body">
    <h2>Confirm Item</h2>
    <hr>
    <div class="row">
   <div class="col-md-7 border-right">
    @foreach(App\cart::totalCarts() as $cart)
    <p>
    {{$cart->product->title}}-
    {{$cart->product->price}} Taka only -
    {{$cart->product_quantity}} Item
    </p>
    @endforeach
    </div>
    <div class="col-md-4">
    @php
   $total_price=0;
   @endphp
   @foreach(App\cart::totalCarts() as $cart)
   @php
   $total_price+=$cart->product->price*$cart->product_quantity;
   @endphp
    @endforeach
    <p>Total Price: {{$total_price}} Taka</p>
    <p>Total Price with Shipping cost: {{$total_price=$total_price+App\division::where('id',Auth::user()->division_id)->value('delivery_charge')}} Taka</p>
    </div>
   </div>
    <p>
    <a href="{{route('carts')}}">Change cart item</a>
    </p>
   
   </div>

    <div class="card card-body mt-4">
    <h2>Shipping Address</h2>
    <hr>
    <div>
    <form method="POST" action="{{ route('user.checkouts.store') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' ' .Auth::user()->last_name : '' }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                                <input type="hidden" name="total_price" value=" {{$total_price+App\setting::first()}}">

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
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                      <div class="form-group row">
                            <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Adress') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="total" value="{{$total_price}}">
                                <textarea id="shipping_address" type="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address" value= ""
                                    >
                                    
                                    {{Auth::user()->division->name}}
                                    
                                </textarea>
                                

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>






                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message (Optional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" type="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message" value=""></textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">Select a Payment method</label>

                            <div class="col-md-6">
                                <select name="payment_method_id" class="form-control" required id="payments">
                                    <option value="Select Payment method please">Select Payment method please</option>
                                    @foreach($payments as $payment)
                                    <option value="{{$payment->sort_name}}">{{$payment->name}}</option>
                                    @endforeach
                                </select>

                             @foreach($payments as $payment)
                              
                             @if($payment->sort_name=="cash_in")
                             <div id="payment_{{$payment->sort_name}}" class="alert alert-success mt-2 text-center hidden">
                            
                             <h3>please confirm your order. we notify you later.<br>
                             <small>you will get your order in 10-12 hour</small>
                             </h3>
                             </div>
                             @else
                             
                             
                             <div id="payment_{{$payment->sort_name}}" class="alert alert-success mt-2 text-center hidden">
                             <h3>{{$payment->name}} Payment</h3>
                             
                             <strong>{{$payment->name}} No: {{$payment->no}}</strong><br>
                             <strong>Account Type: {{$payment->type}}</strong>
                             
                             <div class="alert alert-success">
                             Please Send Money to This Account Number.
                             </div>
                             
                             </div>
                        
                             @endif
                             @endforeach
                           
                             <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Transaction_id">
                           </div>
                            </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mb-2 mt-3">
                                    {{ __('Order Now') }}
                                </button>
                               
                            </div>
                        </div>
                        </div>


                    </form>
                      <form class="form-inline" action="{{route('checkout.delete')}}" method="post">
                        @csrf
                    <button type="submit" style="margin-left: auto;margin-right: 630px;" class="btn btn-danger">Cancel</button>
                    </form> </div>
            <a href="#" class="btn btn-outline-primary w-100"data-toggle="modal" data-target="#bkash">Bkash</a>
            <!-- Modal -->
<div class="modal fade" id="bkash" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bkash Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{url('transaction/payment')}}" method="POST">
        @csrf
  <div class="form-group">
    <label for="to">To</label>
    <input type="text" class="form-control" id="to" name="to" value="01628018234">
  </div>
  <div class="form-group">
    <label for="from">From</label>
    <input type="text" class="form-control" id="from" name="from">
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="number" class="form-control" id="amount" value="{{$total_price}}"name="amount" readonly="">
  </div>
 
  <button type="submit" class="btn btn-primary">Send</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
 $("#payments").change(function(){
           $payment_method= $("#payments").val();
           if($payment_method=="cash_in"){
            $("#payment_cash_in").removeClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#payment_roket").addClass('hidden');
           }
           else if($payment_method=="bkash"){
            $("#payment_bkash").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_roket").addClass('hidden');
            $("#transaction_id").removeClass('hidden');

           } else if($payment_method=="roket"){
            $("#payment_roket").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
           }                   
})
</script>
@endsection