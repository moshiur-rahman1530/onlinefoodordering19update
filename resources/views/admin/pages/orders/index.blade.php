@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Manage Order
                      <form action="{{route('admin.orders.search_all')}}" method="POST" class="text-center py-0">
                        @csrf
                        <input type="date" name="from" required="">
                     
                        <input type="date" name="to" required="">
                      
                        <input type="submit" name="" value="search">
                      </form>
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

                    <table class="table table-striped table-responsive table-bordered"  id="dataTable">
                      
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Orderer ID</th>
                            <th>Orderer Name</th>
                            <th>Orderer phone No</th>
                           <th>Order Date</th>
                           <th>Orderer Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php  $i = 1; ?>
                          @foreach ($orders as $order)
            
                              <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$order->id}}</td>
                                  <td>{{$order->name}}</td>
                                  <td>{{$order->phone_no}}</td> 
                                  <td>{{$order->created_at}}</td>
                                  <td>
                                  
                                  @if( $order->is_seen_by_admin)
                               <button type="button" class="btn btn-success btn-sm">Seen</button>
                               @else
                               <button type="button" class="btn btn-warning btn-sm">Unseen</button>
                                  @endif
                                  

                                
                                  <!-- @if( $order->is_paid)
                               <button type="button" class="btn btn-success btn-sm">Paid</button>
                               @else
                               <button type="button" class="btn btn-warning btn-sm">Unpaid</button>
                                  @endif -->
                                  

                               
                                  @if( $order->is_completed)
                               <button type="button" class="btn btn-success btn-sm">Completed</button>
                               @else
                               <button type="button" class="btn btn-warning btn-sm">Not completed</button>
                                  @endif
                                
                                  </td>
                                  <td>
                                  <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-secondary">
                                  <i class="fa fa-eye"style="color:black;"></i></a>

                                  <a href="#deleteModal{{$order->id}}" data-toggle="modal"class="btn btn-danger">
                                  <i class="fa fa-trash"style="color:black;"></i></a>


                                  <!-- Modal -->
                                 <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                            <div class="modal-body">
                                <form action="{{route('admin.order.delete',$order->id)}}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"style="color:black;"></i>Yes,Delete</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-close"style="color:black;"></i>No,Cancel</button>
                                </form>
                                </div>
                            
                           <div class="modal-footer">
                             
                             
                           </div>
                               </div>
                                   </div>
                                </div>

                        
                                </td>
                                  
                              </tr>
                       @endforeach
                        </tbody>
                        <tfoot>
                     
                        </tfoot>
                        
                    </table>
                    
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


