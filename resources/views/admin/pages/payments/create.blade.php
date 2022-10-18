@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Add Payments
                    </div>
                <div class="card-body">
                    
    <form action="{{route('admin.payment.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
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
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Payment Name ">
  </div>

  <div class="form-group">
    <label for="image">Payment Option Image:</label>
    
        <input type="file" class="form-control" name="image" id="image" >
        </div>
    

        <div class="form-group">
    <label for="priority">Priority:</label>
    <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Priority ">
  </div>

  <div class="form-group">
    <label for="sort_name">Short Name:</label>
    <input type="text" class="form-control" name="sort_name" id="sort_name" aria-describedby="emailHelp" placeholder="Enter Sort Name ">
  </div>
  <div class="form-group">
    <label for="no">No:</label>
    <input type="text" class="form-control" name="no" id="no" aria-describedby="emailHelp" placeholder="Enter Account Number ">
  </div>
  <div class="form-group">
    <label for="type">Type</label>
    <input type="text" class="form-control" name="type" id="type" aria-describedby="emailHelp" placeholder="Enter Account Type">
  </div>
  
  <button type="submit" class="btn btn-primary btn-sm">Add New payment Option</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


