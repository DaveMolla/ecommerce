@extends('adminlte::page')

@section('title', 'Mails')

@section('content_header')
<h1>Mail from customers</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">Mail</h3>

    </div>
    @if ($mails->count() > 0)
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th>Sender Name</th>
                    <th>Subject</th>
                    <th width="500px">Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($mails as $mail)
                <tr>
                    <td><a href="{{route('viewmail',$mail->id)}}">{{$mail->name}}</a></td>
                    <td class="text-bold">{{$mail->subject}}</td>
                    <td>{{Str::limit($mail->message, 100)}}</td>
                    <td>{{$mail->created_at->diffForHumans()}}</td>
                                        
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h4 class="text-center py-5">No Mail Coming Yet</h4>
    @endif


    <!-- /.card-body -->
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
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