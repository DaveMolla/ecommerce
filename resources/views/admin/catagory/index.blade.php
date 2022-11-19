@extends('adminlte::page')

@section('title', 'Catagories')

@section('content_header')

@stop

@section('content')

<div class="row">

    <div class="col-md-4 ">
        <div class="card card-primary shadow">
            <div class="card-header">
                Add Catagory
            </div>

            <div class="card-body">

                <div>
                    <form action="{{route('catagories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control " name="name" value=""
                                placeholder="Catagory ">
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 ">Add</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="text-center w-100">
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
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <p>{{$error}}</p>
        </div>
        @endforeach
        @endif
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary shadow">

            <div class="card-header">
                Catagories

            </div>

            <div class="card-body">



                <div>

                    @if ($catagories->count() > 0)
                    <table class="table table-striped ">
                        <thead class="bg-dark">
                            <th>Name</th>
                            <th>Product Count</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if ($catagories)
                            @foreach ($catagories as $catagory)
                            <tr>
                                <td>{{$catagory->name}}</td>
                                <td>{{$catagory->products()->count()}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="hundleDeletetag({{$catagory->id}})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    @else
                    <h4 class="text-center py-4">No Catagories Yet</h4>
                    @endif
                </div>
                
            </div>


            <form action="" method="POST" id="deleteTagForm">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
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
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function hundleDeletetag(id) {
        var form = document.getElementById('deleteTagForm')
        form.action = "catagories/"+id
        $('#deleteModal').modal('show')
    }
</script>
@stop