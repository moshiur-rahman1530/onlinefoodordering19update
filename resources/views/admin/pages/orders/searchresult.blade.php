@extends('admin.layouts.main')
@section('content')

<div class="main-panel">

  <h2 class="text-info text-center mt-4">Sales History</h2>
                       
          <div class="content-wrapper">
            <div class="row w-90">
            
              
                <div class="col-md-12 mt-4">
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
           

                       <button onclick="myApp.printTable()"><i class="fa fa-print text-danger"></i>Print</button>
                      <form action="{{route('admin.orders.search')}}" method="POST" class="text-center">
                        @csrf
                        <input type="date" name="from" required="">
                     
                        <input type="date" name="to" required="">
                      
                        <input type="submit" name="" value="search">
                      </form>
                 
                    <table class="table table-bordered table-responsive table-hover" border="1" cellpadding="3" id="dataTable">
                    
                    <thead>
                      
                        <tr>
                            <th>#SI</th>
                            <th>Date</th>
                            <th>Orderer ID</th>
                            <th>Orderer Name</th>
                            <th>Orderer phone No</th>
                           
                            <th>Product Name</th>
                            <th>Product Quantity</th>
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
                      
                         @if($order->is_completed)
                        @foreach($order->carts as $cart)
                      
                              <tr>
                                  <td>{{$i++}}</td>
                                   <td>{{$order->created_at}}</td>
                                  <td>{{$order->id}}</td>
                                  <td>{{$order->name}}</td>
                                  <td>{{$order->phone_no}}</td>
                                  <td>
                                  {{$cart->product->title}}</a>
                                  </td>
                                  <td>{{$cart->product_quantity}}</td>
                                  <td>{{$cart->product->price}} Taka</td>
                                  
                                  @php
                                  $total_price+=$cart->product->price*$cart->product_quantity;
                                  @endphp
                                 <td>{{$cart->product->price*$cart->product_quantity}} Taka</td>
                                 <td>{{$order->is_completed}}</td>
                                 
                              </tr>
                              
                        @endforeach
                        @endif
                    @endforeach
                        </tbody>
                     <td colspan="8"></td>

                     <td> <b>Total Price: {{$total_price}} Taka</b></td>
                         <td colspan="1"></td>
                    </table>

                  
    
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
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


</script>
        
@endsection


 
 