@extends('layouts.front')

@section('content')

<header class="header h-fullscreen" style="background-image: url({{asset('img/cover2.jpg')}})">
  <div class="overlay opacity-95" style="background-image: linear-gradient(135deg, #fff 0%, #fff 10%, transparent 100%);"></div>
  <div class="container">
    <div class="row align-items-center h-100">

      <div class="col-md-8 col-lg-6">
        <h1 class="display-5 pt-2"><strong>We trust by our product</strong></h1>
        <p class="lead-2 mt-5 mb-8">Check our new products,  Order anywhere anytime and pick it latter</p>
        
      </div>

    </div>
  </div>
  
      <div class="col-md-12">
          <form class="col-md-8 col-xl-6 input-glass input-round mx-auto" action="{{route('welcome')}}" method="GET">
            <div class="input-group input-group-lg bg-dark">
              <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-fw fa-search"></i></span>
              </div>
              <input type="text" name="search" class="form-control" placeholder="Find Product" value="{{request()->query('search')}}">
              <span class="input-group-append">
                <button class="btn btn-primary">Search</button>
              </span>
            </div>
          </form>
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
              @foreach ($pro as $product)
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
  <section class="section py-5" style="background-color: white;" id="scroll-gallery">
      <div class="container">
      <div>
        <h1 class="text-info text-center" >Our Shop Place</h1>
        <hr class="w-100px bg-danger">
        {{-- <p class="lead text-center ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, adipisci!</p> --}}
      </div>

        <div data-provide="slider" data-autoplay="true" data-slides-to-show="2" data-css-ease="linear" data-speed="12000" data-autoplay-speed="0" data-pause-on-hover="false">
          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{asset('img/home1.jpg')}})"></div>
          </div>

          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{asset('img/home2.jpg')}})"></div>
          </div>

          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{asset('img/home3.jpg')}})"></div>
          </div>

          <div class="p-2">
            <div class="rounded bg-img h-400" style="background-image: url({{asset('img/home4.jpg')}})"></div>
          </div>
        </div>

      <hr class="w-100px bg-danger">
      
    </div>
  </section>


  <section class="section bg-light" id="About">
    <div class="container">

      <div class="row">
        <div class="col-md-5 bg-img mx-5" style="background-image: url(); min-height: 400px;">
        <img src="{{asset('img/about.png')}}" alt="">
        </div>

        <div class="col-md-5 align-self-center text-center text-md-left">
          <h2 class="fw-200">About Us</h2>
          <br>
          <p class="fs-18">
            In todays world everything is becoming digital and eectronic thats why we launched this website so that we can be accesseble to all of our clients at the same time.
          </p>
          <p class="fs-18">
            samy electronics is a well known shop in gonder town with its Material qualities and Fair price we provide products like full barber shop materials,solars,speaker,tapes and others and we are working on the demand and needs of the people.and we are working on a delivery and online payment methods for shops
            </p>
          <br>
          {{-- <div class="social-inline">
            <a class="text-primary " href="#"><i class="fab fa-lg fa-facebook"></i></a>
            <a class="text-info" href="#"><i class="fab fa-lg fa-twitter"></i></a>
            <a class="text-danger" href="#"><i class="fab fa-lg fa-instagram"></i></a>
            <a class="text-danger" href="#"><i class="fab fa-lg fa-google-plus"></i></a>
            <a class="text-primary" href="#"><i class="fab fa-lg  fa-telegram"></i></a>
          </div> --}}
          <br>
        </div>
      </div>

    </div>
  </section>
  <section class="section text-white bg-dark" id="Contact" style="background-image: url({{asset('img/map.jpg')}}); min-height: 300px;">
    <div class="container">
      <header class="section-header">
        <h2>Send any Message</h2>
        <hr>
      </header>
      <div class="row gap-y">
        <div class="col-md-6">

          <form action="{{route('contact')}}" method="POST">
            @csrf
            @csrf
            @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
  
            <div class="form-group">
              <input class="form-control form-control-lg" type="text" name="name" placeholder="Your Name">
            </div>

            <div class="form-group">
              <input class="form-control form-control-lg" type="email" name="email" placeholder="Your Email Address">
            </div>

            <div class="form-group">
              <input class="form-control form-control-lg" type="text" name="subject" placeholder="Subject">
            </div>

            <div class="form-group">
              <textarea class="form-control form-control-lg" name="message" rows="4" placeholder="Your Message"></textarea>
            </div>

            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Send Message">
          </form>

        </div>


        <div class="col-md-5 ml-auto">
          <div class="bg-dark text-white p-5 bordered">
            <p>Give us a call or stop by our door anytime, we try to answer all enquiries within 24 hours on business days.</p>

            <hr class="w-20 my-6">

            <p class="lead">Arada, Around Jantekl Tree<br>Gondar Amhara, Ethiopiia</p>

            <div>
              <span class="text-right pr-2"><i class="fa fa-envelope text-primary" aria-hidden="true"></i></span>

              <span class="">Samyelectronics15@gmail.com</span>
            </div>

            <div>
              <span class="text-right pr-2" title="Phone"><i class="fa fa-phone text-primary"></i></span>
              <span class="small-1">+251 581114148</span>
            </div>

          </div>
        </div>
      </div>


    </div>
  </section>
@endsection
