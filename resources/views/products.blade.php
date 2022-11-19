@extends('layouts.single')

@section('content')
<header class="header text-center text-dark" style="background-color: white" >
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          @if (isset($catagory))
          <h1>{{$catagory->name}}</h1> 
          @else
              <h1>All Products</h1>
          @endif         

        </div>
      </div>
      <div class="col-md-12">
        <form class="col-md-8 col-xl-6 input-glass input-round mx-auto" action="{{route('all')}}" method="GET">
          <div class="input-group input-group-lg bg-dark">
            <div class="input-group-prepend ">
              <span class="input-group-text"><i class="fas fa-fw fa-search"></i></span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Find Product" value="{{request()->query('search')}}">
            <span class="input-group-append">
              <button class="btn btn-success">Search</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </header>
  <main class="main-content" style="background-color: black" id="Products">
    <div class="section text-white">
      <div class="container">
        <div class="row" data-provide="shuffle">
  
          <div class="col-md-4 col-xl-3">
            <div class="sidebar px-4 py-md-0">
  
              <h6 class="sidebar-title">Catagories</h6>
              
              <ul class="nav nav-center nav-bold nav-uppercase nav-slash mb-7" data-shuffle="filter" style="font-size: 18px">
                <li class="">
                    <a class="badge badge-secondary mr-2 active" href="{{route('all')}}" data-shuffle="button">All</a>
                </li>
                @foreach ($catagories as $catagory)
                <li class="">
                  <a class="badge badge-secondary mr-2" href="{{route('ctagory', $catagory->id)}}">{{$catagory->name}}</a>
                </li>
                @endforeach
              </ul>
  
              <hr>
  
              <h6 class="sidebar-title">Top Products</h6>
              @foreach ($pro->sortByDesc('priority') as $product)
              @if ($product->priority == 5)
                  
              <a class="media text-default align-items-center mb-2" href="{{route('detail', $product->id)}}">
                <div data-provide="slider" data-autoplay="false" data-speed="4000" class="w-65px rounded mr-4">
                  @foreach ($product->photos as $object)
                      <img src="{{ asset('img/products/'.$object->photo_path) }} " alt="product">
                  @endforeach
                </div>
                <p class="media-body small-2 lh-4 mb-0">{{$product->name}}</p>
              </a>
              @endif
              @endforeach
              
              
  
              <hr>
  
              
  
              <hr>
  
              <h6 class="sidebar-title">About</h6>
              <p class="small-3"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit eligendi ipsam, iusto harum libero, earum tenetur molestiae totam obcaecati quibusdam vero est excepturi ad aliquam fugit suscipit voluptates architecto quos? </p>
  
  
            </div>
          </div>
  
  
          <div class="col-md-8 col-xl-9">
            @if (request()->query('search'))
            <h3 class="text-primary mb-6">You Serched: <strong>{{request()->query('search')}} </strong></h3>
            @endif           
            @forelse ($products as $product)
            @empty
                <h3 class="text-center text-primary">No result found try again</h3> 
            @endforelse
  
            <div class="row gap-y gap-2" data-shuffle="list">
              
              @foreach ($products->sortByDesc('priority') as $product)
              
              <div class="col-md-4 rounded" data-shuffle="item" data-groups="">
                <a class="portfolio-1" href="{{route('detail', $product->id)}}">
                  <div data-provide="slider" data-autoplay="true" data-speed="4000" >
                    @foreach ($product->photos as $object)
               <img src="{{ asset('img/products/'.$object->photo_path) }} " alt="product" >
           @endforeach
                  </div>
                  @if ($product->priority == 6)
                <div class="ribbon">
               <span class="">New</span>
                </div>
               @endif
                  <div class="portfolio-detail">
                      @if ($product->discount > 0)
                             <h2 class="badge badge-success p-2">{{
                              number_format((float)($product->discount*100)/$product->price, 2, '.', '')
                               }}% Off</h2>
                     @endif
                    <div class="">@foreach ($product->catagories as $object)
                      <p class="badge badge-secondary">{{$object->name}}</p>
                  @endforeach</div>
                  <p class="text-uppercase">Click here to see Detail</p>
                  </div>
                </a>
                <div class="p-2 text-center bg-dark rounded">
                  <h6><a href="{{route('detail', $product->id)}}">{{$product->name}}</a></h6>
                  <div class="product-price">
                    @if ($product->discount > 0)
                        <del class="pr-2">{{$product->price}} </del>
                        {{$product->price - $product->discount}} Birr  
                        @else
                              {{$product->price}} Birr
                        @endif
                  </div>
                </div>
              </div>  
              @endforeach
            </div>
            <div class="row  flex justify-content-center my-8">
              <div class="col-md-8 text-dark">
                {{$products->appends(['search'=>request()->query('search')])->links()}}
              </div>
            </div>
        </div>
      </div>
    </div>
  </main>
@endsection