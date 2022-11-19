@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-uppercase">Welcome </h1>
@stop

@section('content')
      <div class="row">
                  <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$products->count()}}</h3>
                <p>Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
              </div>
              <a href="{{route('product.index')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                
                {{$orders->where('is_sold',0)->count()}}
                
              </h3>

              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="{{route('order')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$catagories->count()}}</h3>

              <p>Catagories</p>
            </div>
            <div class="icon">
              <i class="fas fa-list"></i>
            </div>
            <a href="{{route('catagories.index')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$mails->count()}}</h3>

              <p>Mails</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelope"></i>
            </div>
            <a href="{{route('mail')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>{{ $solds->sum('sold_product')}}</h3>
  
                <p>Total Sold Product</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-square"></i>
              </div>
              <a href="{{route('sold')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>
                
                  {{$orders->where('is_sold',1)->count()}}
                  
                </h3>
  
                <p>Online Solds</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-square"></i>
              </div>
              <a href="{{route('sold')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

      </div>
      <!-- /.row -->

     
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop