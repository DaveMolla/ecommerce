@extends('adminlte::page')

@section('title', 'Solds')

@section('content_header')
@stop

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title">DataTable with sold products</h3>
    <div class="d-flex justify-content-end">
      <a href="{{route('product.create')}}" class="btn btn-success btn-sm mr-2 mb-2">Add Product</a>
    </div>
  </div>
 @if ($solds->count() > 0 )
      <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead class="bg-primary">
        <tr>
          <th>Product Name</th>
          <th>Total Sold</th>
          <th>Total Birr</th>
          <th>Remaining Quantity</th>
          <th>Date</th>
          <th>Edit Product</th>
        </tr>
        </thead>
      <tbody>
      
       
       @foreach ($products as $product )
        @if ($product->solds)
           
       <tr>
        <td>
            {{$product->name}}
           
        </td>
        <td>
          
               {{$product->solds->sold_product}}


        </td>
        <td>{{($totalbirr = $product->price - $product->discount)*$product->solds->sold_product}} Birr</td>
        <td>{{$product->quantity}}</td>
        <td> 
            {{$product->solds->updated_at->format('D d-M-Y ')}}
       </td>
        <td>
            <a href="{{route('product.edit', $product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
            @if ($product->quantity < 1)
            <a href="{{route('soldclear', $product->id)}}" class="btn btn-danger btn-sm">Clear</a>
            <button type="button" class="btn btn-danger btn-sm" onclick="hundleDeletetag({{$product->id}})" ><i class="fa fa-trash"></i></button>
            @endif
          </td>
        </tr>
        @endif

       @endforeach
        </tbody>
        
    </table>
               
  </div>
 @else
     <h4 class="text-center py-5">Nothing Sold yet</h4>
 @endif
  
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
        form.action = "product/"+id
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