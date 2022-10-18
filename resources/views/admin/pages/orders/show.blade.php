@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        View Order {{$order->id}}
                    </div>
                <div class="card-body">
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
                    <h3>Order Information</h3>
                    <div class="row mt-4">
                    <div class="col-md-6">
                       <p><b>Orderer Name: {{$order->name }}</b></p>
                       <p><b>Orderer Phone No: {{$order->phone_no}}</b></p>
                       <p><b>Orderer Email: {{$order->email}}</b></p>
                       <p><b>Orderer Shipping Address: {{$order->shipping_address}}</b></p>
                    </div>
                    <div class="col-md-6">
                    <p><b>Order Payment Method: {{$order->payment->name}}</b></p>
                    <p><b>Order Transaction No: {{$order->transaction_id}}</b></p>
                     <p><b>Paid Amount: {{$order->total}}</b></p>
                    <p><b>Ordered Date: {{$order->created_at}}</b></p>
                  
                    </div>
                    </div>
                    
                </div>
                <hr>
                <h3>Order items: </h3>
                @if($order->carts->count()>0)
                <table class="table table-bordered table-striped" id="dataTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Product Category</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  $i = 1; ?>
            @php
            $total_price=0;
            @endphp
            @foreach($order->carts as $cart)
            <tr>
                <td>
                    {{$i++}}
                </td>
                <td><a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
                <td>
                 @if($cart->product->images->count()>0)
                 <img src="{{asset('images/food/'.$cart->product->images->first()->image)}}" width="100px" alt="">
                 @endif   
                </td>
                <td>
                    <form class="form-inline" action="" method="post">
                        @csrf
                    <input type="" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                    <!-- <button type="submit" class="btn btn-success">Update</button> -->
                    </form>                  
                </td>
                <td>{{$cart->product->category->name}}</td>
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
           
            <tr>
                <td colspan="5"></td>
                <td>Total Amount:</td>
                
                <td colspan="1">           
                   <b>{{$total_price}} Taka</b> 
                </td>
                <td colspan="1"></td>
            </tr> 
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
    @endif
    <hr>

    
    <form class="" action="<!-- {{route('admin.order.charge',$order->id)}} -->" method="post" >
    @csrf
 
  <!--  <label class="mnpr" for="">Shipping Charge</label>
    <input type="number" name="shipping_charge" id="shipping_charge" value="{{$order->shipping_charge}}">
    <br>
    <label class="mnpr" for="">Discount</label>
    <input type="number" name="custom_discount" id="custom_discount" value="{{$order->custom_discount}}">
    <br> -->
   <!--  <label class="mnpr" for=""></label><input type="submit" value="Update" class="btn btn-success"> -->
    <a href="{{route('admin.order.invoice',$order->id)}}" class="btn btn-info ml-3">Generate Boucher</a>
    </form>
    <hr>

    <div>
    <form class="form-inline ml-4" action="{{route('admin.order.completed',$order->id)}}" method="post" 
        style="display:inline-block!important;">
    @csrf
    @if($order->is_completed)
    <input type="submit" value="Cncel Order" class="btn btn-danger">
    @else
    
    <input type="submit" value="Complete Order" class="btn btn-success">
    @endif

    </form>
    

    <!-- <form class="form-inline mb-3" action="{{route('admin.order.paid',$order->id)}}" method="post"
    style="display:inline-block!important">
    @csrf
    @if($order->is_paid)
    <input type="submit" value="Cancel payment" class="btn btn-danger">
    @else
    <input type="submit" value="Paid Order" class="btn btn-success">
    @endif
    </form> -->

    </div>
    
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


