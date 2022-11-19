@extends('adminlte::page')

@section('title', 'View Mail')

@section('content_header')
<h1>View Mail</h1>
@stop

@section('content')
<div class="row flex justify-content-center">
  <div class="col-md-8">
    <div class="card card-primary card-outline">
      <a href="{{route('mail')}}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left pr-2"></i>Back</a>
      <div class="card-header">
        
        <h3 class="card-title">Read Mail</h3>
  
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="mailbox-read-info">
          <h4 class="text-capitalize">{{$usermail->subject}}</h4>
          <h6>From: {{$usermail->email}}
            <span class="mailbox-read-time float-right">{{$usermail->created_at->format('D d-M-Y ')}}</span></h6>
        </div>
        <div class="mailbox-read-message">
          <p>{{$usermail->message}}</p>
  
        </div>
        <!-- /.mailbox-read-message -->
      </div>
  
      <!-- /.card-footer -->
      <div class="card-footer">
        <div class="float-right">
          <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
        <button type="button" class="btn btn-primary" disabled="disabled"><i class="fas fa-print"></i> Print</button>
        </div>
        
      </div>
      <!-- /.card-footer -->
    </div>
  
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
</script>
@stop