@extends('admin.layouts.main')
@section('content')
<div class="ccardmt-3">
<div class="card-body">
    <p>Welcome {{$user->username}}</p>
    
    <table class="table table-hover table-striped table-bordered" border="" id="table">
        <thead class="table-primary">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Avatar</th>
            <th>Permanent Address</th>
            <th>Shipping Address</th>
            <th>IP Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>#{{$user->id}}</td>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_no}}</td>
                <td>{{$user->avatar}}</td>
                <td>{{$user->permanent_address}}</td>
                <td>{{$user->division->name}}</td>
                <td>{{$user->ip_address}}</td>
                <td>{{$user->status}}</td>
                <td>
                <button onclick="myApp.printTable()"><i class="fa fa-print text-danger"></i>Print</button> 
             
                </td>
            </tr>
        </tbody>
    </table>

</div>
</div>

        <script>
            var myApp = new function () {
            this.printTable = function () {
            var table = document.getElementById('table');
            var win = window.open('', 'border=1', 'height=700,width=700');
            win.document.write(table.outerHTML);
            win.document.close();
            win.print();
             }
             }
       </script>  
@endsection

