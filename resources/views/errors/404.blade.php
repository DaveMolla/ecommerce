@extends('layouts.app')

@section('content')
<section class="row d-flex justify-content-center">
    <div class="col-md-6">
      <h2 class="display-2 text-warning"> 404</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

        <p>
          We could not find the page you were looking for.
          Meanwhile, you may <a href="{{route('welcome')}}">return to home</a>
        </p>

      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
@endsection