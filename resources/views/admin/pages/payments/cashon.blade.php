@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                      Payment history
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
                  <button onclick="myApp.printTable()"><i class="fa fa-print text-danger"></i>Print</button>  
                  <h4 class="text-center text-danger">Total Balance: {{App\Account::where('user_id',Auth::user()->id)->value('balance')}}</h4>
                    <table class="table table-bordered table-hover" border="1" cellpadding="1" id="dataTable">
                        <thead>
                          <th>SL</th>
                          <th>User</th>
                          <th>Phone</th>
                          <th>Total</th>
                          <th>Approved</th>
                          <th>Date</th>
                        </thead>
                        <tbody>
                            <?php $total=0;?>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone_no}}</td>
                                <td>{{$item->total}}</td>
                                 <td>{{$item->is_completed}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                            <?php $total+=$item->amount?>
                            @endforeach
                        </tbody>
                       <tbody>
                     
                       </tfoot>
                    </table> 
                <h2 class="text-center text-danger"> Total CashOn {{$total}} -Tk</h2>
                </div>
            </div>
        </div>
        </div>
        <!-- main-panel ends -->
        <script>
    var myApp = new function () {
        this.printTable = function () {
            var dataTable = document.getElementById('dataTable');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(dataTable.outerHTML);
            win.document.close();
            win.print();
        }
    }


</script>
@endsection