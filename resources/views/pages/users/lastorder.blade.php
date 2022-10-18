@extends('pages.users.usersidebar')
@section('sub-content')

<div class="row">

      <div class="col-md-10">
      
    </div>
    <div class="col-md-2 float-right">
        <td><button onclick="myFunction()"><i class="fa fa-print text-danger"></i>Print All</button></td>
    </div>

   
</script>
      <h3>Last Order info</h3><hr>
                     <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>SI</th>
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Order product</th>
                            <th>Order Product Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Approved By</th>
                 
                            <th>Invoice</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $i = 1; ?>
                        @php
                        $total_price=0;
                        @endphp
                        @foreach ($orders as $order)
                       
                        @foreach($order->carts as $cart)
                              <tr>
                              <td> 
                               {{ $i++ }}
                         </td>
                              <td>{{$order->created_at}}</td>
                                  <td>{{$order->id}}</td>
                                  <td>{{$cart->product->title}}</td>
                                  <td>{{$cart->product_quantity}}</td>
                                  
                                  <td>{{$cart->product->price}} Taka</td>
                                  
                                  @php
                                  $total_price+=$cart->product->price*$cart->product_quantity;
                                  @endphp
                                 <td>{{$cart->product->price*$cart->product_quantity}} Taka</td>
                                 <td>{{$order->is_completed}}</td>
                              
                                <td> 
                                <a href="{{route('user.invoice',$order->id)}}">Generate Invoice</a> </td>
       
                              </tr>
                         
                              @endforeach
                         
                        @endforeach
                        
                        </tbody>
                   
                    </table>
                     </div>
<script>
function myFunction() {
  window.print();
}
</script>
                     @endsection