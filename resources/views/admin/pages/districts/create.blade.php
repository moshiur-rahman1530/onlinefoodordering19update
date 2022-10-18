@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                        Add District
                    </div>
                <div class="card-body">
                    
    <form action="{{route('admin.district.store')}}" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter district name ">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Select a division for this district</label>
    <select name="division_id" class="form-control">
    <option value="">please select division for this district</option>

    @foreach($divisions as $division)
<option value="{{$division->id}}">{{$division->name}}</option>
    @endforeach
    </select>
  </div>


  <button type="submit" class="btn btn-primary btn-sm">Add New District</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


