@extends('adminlte::page')

@section('title', 'Password')

@section('content_header')
    <h1>Welcome </h1>
@stop

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
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
        <div class="card shadow">
            
            <a href="{{route('product.index')}}" class="btn btn-sm btn-dark"><i class="fa fa-chevron-left pr-2"></i>Back</a>
            <form action="{{route('changepassword')}}" method="POST" enctype="multipart/form-data">
            <div class="card-header bg-primary">
                Change Password
            </div>
            <div class="card-body">
               
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="account-old-password">Old Password</label>
                                    <input id="password" type="password" class="form-control" name="current_password" placeholder="Old Password">
                                </div>
                                @if ($errors->any())
                                    @foreach ($errors->get('current_password') as $error)
                                    <small class="text-danger " id="errormsg">{{$error}}</small>
                                    @endforeach
                                    @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="account-new-password">New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password" placeholder="New Password">
                                </div>
                                @if ($errors->any())
                                @foreach ($errors->get('new_password') as $error)
                                <small class="text-danger " id="errormsg">{{$error}}</small>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="account-retype-new-password">Retype New
                                        Password</label>
                                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" placeholder="Confirm Password">
                                </div>
                                @if ($errors->any())
                                @foreach ($errors->get('new_confirm_password') as $error)
                                <small class="text-danger " id="errormsg">{{$error}}</small>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
               
                     
            </div>
            <div class="card-footer">
                
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                        changes</button>
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
    <script> console.log('Hi!'); </script>
@stop