@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Manage Category
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
                    
                    <table class="table table-hover table-striped"id="dataTable">
                        <thead class="bg-secondary">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                           {{--<th>Parent Category</th>--}}
                            <th>Action</th>
                      </tr>
                     </thead>
                     <tbody>
                       <?php  $i = 1; ?>
                        @foreach ($categories as $category)
                            
                              <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$category->name}}</td>
                                  <td>
                                  <img src="{!!asset('images/categories/'.$category->image)!!}" width="100">
                                  
                                  </td>
                                  {{--<td>
                                  @if( $category->parent_id==null)
                                  primary

                                  @else
                                  {{$category->parent->name}}
                                  @endif
                                  </td>--}}
                                  <td><a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-success">
                                  <i class="fa fa-edit"style="color:black;"></i>Edit
                                  </a>
                                  <a href="#deleteModal{{$category->id}}" data-toggle="modal"class="btn btn-danger">
                                  <i class="fa fa-trash"style="color:black;"></i>Delete</a>

                                  <!-- Modal -->
                                 <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                            <div class="modal-body">
                                <form action="{{route('admin.category.delete',$category->id)}}" method="post">
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
                            <th>Category Name</th>
                            <th>Category Image</th>
                           {{--<th>Parent Category</th>--}}
                            <th>Action</th>
                      </tr>
                     </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


