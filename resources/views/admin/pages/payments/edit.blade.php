@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                    Edit Food payment
                    </div>
                <div class="card-body">
             
                <form action="{{route('admin.payment.update',$payment->id)}}" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$payment->name}}">
  </div>

  <div class="form-group">
    <label for="image">payment Old Image</label><br>
    <img src="{!!asset('images/payments/'.$payment->image)!!}" width="100"><br>
    <label for="image">payment New Image(optional))</label>
        <input type="file" class="form-control" name="image" id="image" >
        </div>
        <div class="form-group">
    <label for="priority">Priority</label>
    <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" value="{{$payment->priority}}">
  </div>

  <div class="form-group">
    <label for="sort_name">Short Name</label>
    <input type="text" class="form-control" name="sort_name" id="sort_name" aria-describedby="emailHelp" value="{{$payment->sort_name}}">
  </div>

  <div class="form-group">
    <label for="no">No</label>
    <input type="text" class="form-control" name="no" id="no" aria-describedby="emailHelp" value="{{$payment->no}}">
  </div>
  
  <div class="form-group">
    <label for="type">Type</label>
    <input type="text" class="form-control" name="type" id="type" aria-describedby="emailHelp" value="{{$payment->type}}">
  </div>


  <button type="submit" class="btn btn-primary btn-sm">Update payment</button>

</form>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        
@endsection


