@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
            <div class="col-md-12">
                   <h3 class="text-center">All Users</h3>     
                    </div>
                <div class="card card-body p-2">
                
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
<button onclick="myApp.printTable()" type="button"class="btn btn-light" style="width: 10%;"><i class="fa fa-print text-danger"></i>Print</button> 
                     
                    
                    <table class="table table-hover table-striped table-bordered" border=""  id="dataTable">
                        <thead class="thead-dark">
						<tr>
					<th>#</th>
					<th>User Name</th>
					<th>User Email</th>
					<!--<th>Phone</th>
					<th>Permanent Address</th>
					<th>Shipping Address</th>
					<th>Photo</th>-->
					<th>User Status</th>
					<th>Actions</th>
				</tr>
                        </thead>
                       <tbody>
					  <?php  $i = 1; ?>
                           
                       @foreach ($users as $user)
                            
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->first_name }} {{$user->last_name}}</td>
								<td>{{ $user->email }}</td>
								<!--<td>{{ $user->phone_no }}</td>
								<td>{{ $user->permanent_address}},{{ $user->district }},{{ $user->division }}</td>
								<td>{{ $user->shipping_address}}</td>
								<td>{{ $user->avatar }}</td>-->
                                <td>@if ($user->status == 1)
						<span class="label label-primary">Active</span>

						@else
						<span class="label label-danger">Banned</span>
						@endif</td>
                        
                                <td><a href="{{ route('user.single',$user->id)}}" class="btn btn-success" style="text-decoration:none;color: black"><i class="fa fa-eye"style="color:black;"></i>View User</a>

                                   <a href="#deleteModal{{$user->id}}" data-toggle="modal"class="btn btn-danger"><i class="fa fa-trash"style="color:black;"></i>Delete</a>

                                <!-- Modal -->
                               <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                               <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                          <div class="modal-body">
                              <form action="{{route('admin.user.delete',$user->id)}}" method="post">
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
					   <tr>
					<th>#</th>
					<th>User Name</th>
					<th>User Email</th>
					<!--<th>Phone</th>
					<th>Permanent Address</th>
					<th>Shipping Address</th>
					<th>Photo</th>-->
					<th>User Status</th>
					<th>Actions</th>
				</tr>
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
            var win = window.open('', 'border=1', 'height=700,width=700,');
            win.document.write(dataTable.outerHTML);
            win.document.close();
            win.print();
             }
             }
       </script> 
@endsection




<!--User view-->




	
				