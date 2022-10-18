@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                  <h3>Active products</h3> 
    
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
                    
                    <table class="table table-bordered table-hover" border="" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Code</th>
                            <th>Product Title</th>
                            <th>Price</th>
                             <th>Category</th>
                             <th>Date</th>
                         
                        </tr>
                        </thead>
                       <tbody>
                        <?php  $i = 1; ?>
                         
                       @foreach ($products as $product)
                            
                            <tr>
                                <td>{{$i++}}</td>
                                <td>#FI{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->created_at}}</td>
                                
                            </tr>
                      @endforeach
                       </tbody>
                       <tfoot>
                      
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
            var win = window.open('', 'border=1', 'height=700,width=700');
            win.document.write(dataTable.outerHTML);
            win.document.close();
            win.print();
        }
    }


</script>
@endsection


