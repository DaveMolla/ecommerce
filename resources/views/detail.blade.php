@extends('layouts.single')

@section('content')
<header class="header text-center text-white" style="background-color: black" >
    <canvas class="constellation" data-color="#e3342f"></canvas>
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>{{$products->name}}</h1>
          <div class="">
            @foreach ($products->catagories as $item)
            <span class="lead-2 opacity-90 mt-6 text-capitalize text-info ml-3">{{$item->name}}</span>
            @endforeach
          </div>
         
        </div>
      </div>

    </div>
  </header>
  <section class="bg-light pt-5">
    <div class="row my-4">
      <div class="col-md-12 d-flex justify-content-center  bg-danger">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <small class="text-danger alert alert-danger m-2" id="errormsg">{{$error}}</small>
        @endforeach
        @endif
        
        @if (session('success'))
        <div class="alert alert-success m-2 w-50" role="alert"> 
            <h3 class="text-center">{!! session('success') !!}</h3>
        </div>
    @endif
    @if (session('error'))
                <div class="alert alert-danger m-2" role="alert">
                    <h3>{{ session('error') }}</h3>
                </div>
                @endif
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-md-6 ml-auto order-md-last mb-7 mb-md-0">
          
            <div class="gallery inline">
              
                  @foreach ($products->photos as $object)
                  <a class="gallery-item" href="#">
                    <img src="{{asset('img/products/'.$object->photo_path)}}" alt="..." data-provide="lightbox">
                  </a>
              @endforeach
              </div>
        </div>
        <div class="col-11 mx-auto col-md-5 mx-md-0 bg-dark text-white p-3 rounded">
          {{$products->name}}
          {!!$products->description!!}

          <div class="row gap-y align-items-center text-center bg-success rounded p-5 mt-7">
            <div class="col-md-auto ml-auto order-md-last">
              <h2 class="mb-0">
                @if ($products->discount > 0)
                <del>{{$products->price}} </del>Birr
                @else
                {{$products->price}} Birr
                @endif
                
            </h2>
              
                @if ($products->discount > 0)
                <h4 class="lead-2">{{$products->price - $products->discount}} Birr</h4>
                
                @endif
              
            </div>

            <div class="col-md-auto">
              <a class="btn py-2 btn-primary" data-toggle="modal" data-target="#modal-background">Purchase  @if ($products->discount > 0)
                <span class="mt-0 rounded badge badge-success">
                    -{{
                       number_format((float)($products->discount*100)/$products->price, 2, '.', '')
                        }}%
                    <small></small>
                </span>
                @endif</a>
            </div>
          </div>
        </div>

      </div>

      <hr class="my-8">

      <div class="row">
        <div class="col-lg-8 mx-auto">

        
          <h6>Shipping info</h6>
          <p>After ordering the product a successful message & order number will display, use the order number to pick the product. </p>

        </div>
      </div>

    </div>
    <div class="modal modal-top  fade" id="modal-background" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-img" style="background-color: black" data-overlay="5">

            <div class="modal-body text-white">
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <br>
              <p class="text-center text-info">Please complete those field to make ur order</p>
              <br>
              <form action="{{route('customerOrder', $products->id)}}" method="POST">
                @csrf
                @method('PUT')
                  <div class="row container">
                      <div class="col-md-6 py-2"><input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                      </div>
                      <div class="col-md-6 py-2"><input type="text" name="lastName" class="form-control" placeholder="Last Name" required></div>
                      <div class="col-md-12 py-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text pr-2">+251 </span>
                        </div>
                          <input type="text" name="phone" class="form-control" placeholder="9-" required>
                        </div>
                      </div>
                      <div class="col-md-12 py-2"><input type="text" name="quantity" class="form-control" placeholder="Quantity" required></div>
                     
                  </div>
                  <div class=" d-flex justify-content-center py-2"><input type="submit" class="btn btn-lg btn-primary" value="Order"></div>
              </form>
              <br><br>
            </div>

          </div>
        </div>
      </div>
  </section>
@endsection