<div class="container">
        <div class="row">
        
                <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-12">
                              <h4 style="text-align:center">
                                <i class="fa fa-globe"></i> Bangla restaura
                                <small class="float-right"> {{ $order->created_at }}</small>
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                          <div class="row">
                            <div class="col-md-4 invoice-col">
                              From
                              <address>
                                <strong>Admin Bangla restaura.</strong><br>
                                Zilla school road cumilla<br>
                                Phone: 01934622580<br>
                                Email: info@banglarestaura.com
                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4 invoice-col">
                              To
                              <address>
                                <strong>{{$order->name }}</strong><br>
                                {{$order->shipping_address}}<br>
                        
                                Phone: {{$order->phone_no}}<br>
                               <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              <b>Invoice {{$order->id}}</b><br>
                              <br>
                            </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <h3>Order items: </h3>
                @if($order->carts->count()>0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product Title</th>
            
                <th>Product Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                
            </tr>
        </thead>
        <tbody>
            @php
            $total_price=0;
            @endphp
            @foreach($order->carts as $cart)
            <tr>
                <td>
                    {{$loop->index + 1}}
                </td>
                <td><a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->slug}}</a></td>
               
                <td>
                   {{$cart->product_quantity}}
                                     
                </td>
                <td>{{$cart->product->price}} Taka</td>
                @php
            $total_price+=$cart->product->price*$cart->product_quantity;
            @endphp
                <td>{{$cart->product->price*$cart->product_quantity}} Taka</td>
                
            </tr>
            @endforeach

           

            <tr>
                <td colspan="3"></td>
                <td>Shipping Cost:</td>
                
                <td colspan="2">           
                   <b>{{$order->shipping_charge}} Taka</b> 
                </td>
                <td colspan="3"></td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td>Total Amount:</td>
                
                <td colspan="2">           
                   <b>{{$total_price+=$order->shipping_charge-$order->custom_discount}} Taka</b> 
                </td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>
    @endif
    <div class="thanks mt-3">
          <h4>Thank you for your business !!</h4>
        </div>

        <div class="authority float-right mt-5">
            <p>-----------------------------------</p>
            <h5>Authority Signature:</h5>
          </div>
                        <!-- /.invoice -->
                      </div>


        </div>
    </div>




