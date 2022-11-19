@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
@stop

@section('content')

<div class="card">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="card-header bg-primary">
        <h3 class="card-title">Ordered</h3>

    </div>
    @if ($orders->count() > 0)
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->product_quantity}}</td>
                    <td>{{$order->order_number}}</td>
                    <td class="text-capitalize">{{$order->customer_fname}} {{$order->customer_lname}}</td>
                    <td>+251 {{$order->customer_phone}}</td>
                    <td>{{$order->created_at->format('D d-M-Y ')}}</td>
                    <td>
                        @if ($order->is_sold == 0)
                        <form action="{{route('orderDone', $order->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn btn-success" value="Sold">
                        </form>
                        @else
                        <button type="button" class="btn btn-danger btn-sm" onclick="hundleDeletetag({{$order->id}})" ><i class="fa fa-trash"></i></button>
                        @endif

                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h4 class="text-center py-5">No Order coming yet </h4>
    @endif


    <!-- /.card-body -->
</div>
<form action="" method="POST" id="deleteTagForm">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No go back</button>
              <button type="submit" class="btn btn-danger">Yes Delete</button>
            </div>
          </div>
        </div>
      </div>
  </form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
      function hundleDeletetag(id) {
        var form = document.getElementById('deleteTagForm')
        form.action = "orderdelete/"+id
        $('#deleteModal').modal('show')
    }

    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop