
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
             
    			<h2>Invoice</h2><h3 class="pull-right">Order {{ $order->id }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>From:</strong><br>
                    {{ $order->is_completed }}<br>
    					Zilla school Road Cumilla<br>
    					info@banglarestaura.com<br>
    					01934622580
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                    {{ $order->name }}<br>
                    {{ $order->shipping_address }}<br>
                    {{ $order->phone_no }}<br>
                    {{ $order->email }}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$order->payment->name}}<br>
    					{{$order->transaction_id}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ $order->created_at }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
   

    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
                
    			<div class="panel-body">
    				<div class="table-responsive">
                        
                    
    					<table class="table table-condensed">
    						<thead>
                                
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
                          
    						<tbody>

                              @php
                            $total_price=0;
                             @endphp
                            @foreach($order->carts as $cart)
                    @if($order->carts->count()>0)
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>{{$cart->product->slug}}</td>
    								<td class="text-center">{{$cart->product_quantity}}</td>
    								<td class="text-center">{{$cart->product->price}} Taka</td>
                                    @php
                                     $total_price+=$cart->product->price*$cart->product_quantity;
                                     @endphp
    								<td class="text-right">{{$cart->product->price*$cart->product_quantity}} Taka</td>
    							</tr>
                               
    							<tr>
    								
    								<td class="" colspan="2"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">{{$cart->product->price*$cart->product_quantity}} Taka</td>
    							</tr>
                                <tr>
    								<td class="" colspan="2"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">{{$order->shipping_charge}} Taka</td>
    							</tr>
    							<tr>
    								<td class="" colspan="2"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">{{$total_price+=$order->shipping_charge-$order->custom_discount}} Taka</td>
    							</tr>
                                @endif
                        @endforeach
    						</tbody>
                            
    					</table>  
                    
                        
    				</div>
    			</div>
                
    		</div>
            <div class="thanks mt-3">
                        <h4>Thank you for your business !!</h4>
                        </div>

                         <div class="authority float-right mt-5">

                         <p>{{$order->is_completed}}</p>
                         <p>----------------------------</p>
                          <h5>Authority Signature:</h5>
                          </div>
    	</div>
        
    </div>
    
</div>


<div class="row">
      <div class="col-md-6">
      
    </div>
    <div class="col-md-6">
        <button onclick="myFunction()"><i class="fa fa-print text-danger"></i>Print Invoice</button>
         <button><a href="{{route('user.invoice.download',$order->id)}}">Download</a></button>
    </div>
        
    </div>
      <script>
function myFunction() {
  window.print();
}
</script>



<!-- <div class="container">
        <div class="row">
                <div class="col-12">

                       
                        <div class="invoice p-3 mb-3">
                      
                          <div class="row">
                            <div class="col-12">
                              <h4 style="text-align:center">
                                <i class="fa fa-globe"></i> Bangla restaura
                                <small class="float-right"> {{ $order->created_at }}</small>
                              </h4>
                            </div>
                           
                          </div>
                         
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                              From
                              <address>
                                <strong>{{$order->is_completed}}</strong><br>
                                Zilla school road cumilla<br>
                                Phone: 01934622580<br>
                                Email: info@banglarestaura.com
                              </address>
                            </div>
                           
                            <div class="col-sm-4 invoice-col">
                              To
                              <address>
                                <strong>{{$order->name }}</strong><br>
                                {{$order->shipping_address}}<br>
                                Phone: {{$order->phone_no}}<br>
                              Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a>
                              </address>
                            </div>
                            
                            <div class="col-sm-4 invoice-col">
                              <b>Invoice {{$order->id}}</b><br>
                              <br>
                            </div>
                            
                          </div>
                        

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
                <td>Discount:</td>
                
                <td colspan="2">           
                   <b>{{$order->custom_discount}} Taka</b> 
                </td>
                
            </tr>

            <tr>
                <td colspan="3"></td>
                <td>Shipping Cost:</td>
                
                <td colspan="2">           
                   <b>{{$order->shipping_charge}} Taka</b> 
                </td>
              
            </tr>

            <tr>
                <td colspan="3"></td>
                <td>Total Amount:</td>
                
                <td colspan="2">           
                   <b>{{$total_price+=$order->shipping_charge-$order->custom_discount}} Taka</b> 
                </td>
                
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
                        
                      </div>


        </div>
    </div>

 -->









