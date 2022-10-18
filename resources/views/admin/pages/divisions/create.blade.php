@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Add Area
                    </div>
                <div class="card-body">
                    
    <form action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data">
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
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division Title ">
  </div>
 <span class="text-danger">{{$errors->first('name')}}</span>
  <div class="form-group">
    
              <label for="shipping">Shipping Cost</label>
              <input type="text" class="form-control" name="delivery_charge" id="shipping" aria-describedby="emailHelp">
            </div>
   <span class="text-danger">{{$errors->first('delivery_charge')}}</span>


  <button type="submit" class="btn btn-primary btn-sm">Add New division</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


