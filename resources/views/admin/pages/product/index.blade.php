@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        <h3>Manage Food</h3>
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
           <!--    <a class="btn btn-success" href="{{route('admin.product.create')}}">Add New Item</a>    -->    
                    <table class="table table-hover table-striped table-bordered" id="dataTable">
                        <thead class="text-center Active thead-dark">
                        <tr>
                          <th>#</th>
                          <th>Product Code</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                       <tbody class="text-center">
                          <?php  $i = 1; ?>
                       @foreach ($products as $product)
                            
                            <tr>
                                <td>{{$i++}}</td>
                                <td>#FI{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                  <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-success"><i class="fa fa-edit"style="color:black;"></i>Edit</a>
                                <a href="#deleteModal{{$product->id}}" data-toggle="modal"class="btn btn-danger ml-4"><i class="fa fa-trash"style="color:black;"></i>Delete</a>
                                <form class="form-inline ml-4" action="{{route('admin.product.status',$product->id)}}" method="post" 
                                  style="display:inline-block!important;">
                                    @csrf
                                   @if($product->status)
                                 <button type="submit" value="Active" class="btn btn-success "><i class="fa fa-check" style="color:black;"></i>Active</button>
                                  @else
                                 <button type="submit" value="Inactive" class="btn btn-danger"><i class="fa fa-lock" style="color:black;"></i>Inactive</button>
                                 @endif
                                   </form>

                                <!-- Modal -->
                               <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                               <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                          <div class="modal-body">
                              <form action="{{route('admin.product.delete',$product->id)}}" method="post">
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
                       <tfoot class="text-center">
                       <th>#</th>
                            <th>Product Code</th>
                            <th>Product Title</th>
                            <th>Price</th>
                           
                            <th>Action</th>
                       </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


