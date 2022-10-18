@extends('admin.layouts.main')
@section('content')


         
            <div class="card">
            <div class="card-header">
                        User message
                    </div>
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
             <div class="card-body">
             <table class="table table-hover table-stripped">
               <thead>
                <th>Sl</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Sent</th>
                <th>Reply</th>
               </thead>
               <tbody>
                 <tr>
                   <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->message}}</td>
                    <td>{{$contact->created_at}}</td>
                    <td>
                      <form action="{{route('admin.contact_reply')}}" method="POST">
                       @csrf
                        <input type="text" name="reply"required>
                       <input type="hidden" name="id" value="{{$contact->id}}">
                        <button type="submit" class="btn btn-success">Send</button>  
                      </form>
                    </td>
                 </tr>
               </tbody>
             </table>
            
             </div>
             </div>
    
        
@endsection


