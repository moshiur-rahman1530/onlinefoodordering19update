@extends('admin.layouts.main')
@section('content')

<div class="main-panel">

  <h2 class="text-info text-center mt-4">All order list</h2>
                       
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

                 
                   <table class="table table-hover table-striped "  border="1" cellpadding="3" id="dataTable">
                      
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Orderer ID</th>
                            <th>Orderer Name</th>
                            <th>Orderer phone No</th>
                            <th>Order Price</th>
                           <th>Order Date</th>
                         
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
                                  <td>{{$order->id}}</td>
                                  <td>{{$order->name}}</td>
                                  <td>{{$order->phone_no}}</td> 
                                  <td>{{$cart->product->price}}</td> 
                                  <td>{{$order->created_at}}</td> 
                              </tr>
                                  @php
                                  $total_price+=$cart->product->price*$cart->product_quantity;
                                  @endphp
                        
                       @endforeach
                        @endforeach
                        </tbody>
                        <tfoot>
                           <td colspan="4"></td>
                            <!--  <td><b>Total order:{{$orders->count()}}</b></td> -->


                     <td> <b>Total Price: {{$total_price}} Taka</b></td>
                         
                           
                        </tfoot>
                        
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


 
 