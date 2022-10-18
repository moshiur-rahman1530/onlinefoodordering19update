@extends('pages.users.usersidebar')
@section('sub-content')

<div class="container">
  
<div class="card card-body card-border">

    <p>Welcome {{$user->first_name}} {{$user->last_name}}</p>
    <p>Name: {{$user->first_name}} {{$user->last_name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Phone: {{$user->phone_no}}</p>
    <p>Paemanent Address: {{$user->permanent_address}}</p>
  


</div>

</div>


<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
           
                        
                    
                <div class="col-md-12 mt-5">
                    <h4 class="text-center">All Order History</h4><hr>
                    
                    <table class="table table-hover table-bordered text-center table-striped" border="1" cellpadding="3" id="dataTable">

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
                              <td>{{$i++}}</td>
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
                                
                              </tr>
                              


                           @endforeach
                         
                        @endforeach
                        </tbody>
                       <td colspan="6"></td>
                       <td><b>Total Price: {{$total_price+=$order->shipping_charge-$order->custom_discount}} Taka</b></td>
                       <td colspan="1"></td>
                           
                    </table>
                   <center> <button class="show-on-print" onclick="myApp.printTable()"><i class="fa fa-print text-danger"></i>Print</button></center> 
                </div>
            </div>
        </div>
        </div>

      <!--   <script>
function myFunction() {
  window.print();
}
</script> -->
<script>
    var myApp = new function () {
        this.printTable = function () {
            var dataTable = document.getElementById('dataTable');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(dataTable.outerHTML);

            win.document.close();
            win.print();
        }
    }
    $('#print').on('click', function() {
  dataTable();
  window.location = 'Header.html';
})

</script>



@endsection



                   