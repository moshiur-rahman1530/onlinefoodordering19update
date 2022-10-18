@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                    Edit Division
                    </div>
                <div class="card-body">
                    
                <form action="{{route('admin.division.update',$division->id)}}" method="post" enctype="multipart/form-data">
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
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $division->name }}">
            </div>
           
             <div class="form-group">
              <label for="shipping">Shipping Cost</label>
              <input type="text" class="form-control" name="delivery_charge" id="shipping" aria-describedby="emailHelp" value="{{ $division->delivery_charge }}">
            </div>
 
  <button type="submit" class="btn btn-primary btn-sm">Update Division</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


