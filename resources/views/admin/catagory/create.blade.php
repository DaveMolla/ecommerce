@extends('adminlte::page')

@section('title', 'Create Catagory')

@section('content_header')
@stop

@section('content')
    <div class="row flex justify-content-center">
        <div class="col-md-6 ">
            <div class="card card-primary shadow">
                <div class="card-header">
                    Add Catagory
                </div>
    
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                            <p>{{$error}}</p>
                            </div>
                        @endforeach
                    @endif
                    <div>
                    <form action="{{route('catagories.store')}}" method="POST">
                        @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control w-50" name="name" value="" placeholder="Catagory ">
                                    </div>
                                    <button type="submit" class="btn btn-primary px-5">Add</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop