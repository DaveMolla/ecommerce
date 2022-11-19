@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
@stop

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title text-capitalized">Data Table With All Products</h3>
    <div class="d-flex justify-content-end">
      <a href="{{route('product.create')}}" class="btn btn-success btn-sm mr-2 mb-2">Add Product</a>
      <a href="{{route('sold')}}" class="btn btn-info btn-sm  mb-2">Sold Products</a>
    </div>
  </div>
  @if ($products->count() > 0 )
  <!-- /.card-header -->
  <div class="card-body">
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
    <table id="example1" class="table table-bordered table-striped">
      <thead class="bg-primary">
        <tr>
          <th>Product Image</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Discount</th>
          <th>Catagories</th>
          <th>created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>


        @foreach ($products as $product )
        @if ($product->quantity > 0)
        <tr>
          <td>@foreach ($product->photos as $object)
            <img src="{{ asset('img/products/'.$object->photo_path) }} " width="50px">
            @endforeach</td>
          <td>{{$product->name}}</td>
          @if ($product->quantity < 10) <td class="bg-danger">{{$product->quantity}}</td>
            @else
            <td>{{$product->quantity}}</td>
            @endif
            <td>{{$product->price}} Birr</td>
            <td>{{$product->discount}} Birr</td>
            <td>@foreach ($product->catagories as $object)
              {{$object->name}}
              @endforeach</td>
            <td>{{$product->created_at->diffForHumans()}}</td>
            <td>
              <a href="{{route('product.show', $product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
              <a href="{{route('product.edit', $product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
              <button type="button" class="btn btn-danger btn-sm" onclick="hundleDeletetag({{$product->id}})" ><i class="fa fa-trash"></i></button>
              <form action="{{route('soldUpdate', $product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group py-2">
                  <input type="text" name="soldquantity" class="form-control w-25" placeholder="Sold Quantity">
                  <input type="submit" class="btn btn-success" value="Sold">
                </div>

              </form>
            </td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
  @else
  <h4 class="text-center py-5">No Products Added yet</h4>
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