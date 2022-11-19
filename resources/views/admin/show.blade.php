@extends('adminlte::page')

@section('title', 'Detail')

@section('content_header')

@stop

@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card card-solid shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    
                    <div class="col-12">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                           
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('img/first.jpg')}}"
                                        alt="First slide">
                                </div>
                                @foreach ($products->photos as $object)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('img/products/'.$object->photo_path)}}"
                                        alt="Third slide">
                                </div>
                                @endforeach
                                
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="display-5 text-uppercase">{{$products->name}}</h3>
                      {!!$products->description!!}

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            @if ($products->discount > 0)
                            <del>{{$products->price}} </del>Birr
                            @else
                            {{$products->price}} Birr
                            @endif
                            
                        </h2>
                        @if ($products->discount > 0)
                        {{$products->price - $products->discount}} Birr
                        <h4 class="mt-0 rounded badge badge-success">
                            {{
                               number_format((float)($products->discount*100)/$products->price, 2, '.', '')
                                }}%
                            <small> off</small>
                        </h4>
                        @endif
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-3"> 
                                <label for="">Quantity</label>
                                <h1>{{$products->quantity}}</h1>
                            </div>
                            <div class="col-md-6"> 
                                <form action="{{route('soldUpdate', $products->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group py-2">
                                      <input type="text" name="soldquantity" class="form-control w-25" placeholder="Sold Quantity">
                                      <input type="submit" class="btn btn-primary" value="Sold">
                                    </div>
                                    
                                   </form> 
                                    <div class="mt-5">
                                        <a href="{{route('product.edit', $products->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit </a>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hundleDeletetag({{$products->id}})" ><i class="fa fa-trash"></i> Delete </button>
                                    </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                            role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                            role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a
                        eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel.
                        Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed
                        venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus.
                        Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit
                        mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies
                        neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc
                        vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros,
                        vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus.
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                        condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                        commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis
                        elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare,
                        eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod
                        lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget,
                        ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui.
                        Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean
                        elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque.
                        Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                        neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh
                        rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl.
                        Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit,
                        at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta
                        lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper.
                        Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <form action="" method="POST" id="deleteTagForm">
        @csrf
        @method('DELETE')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
     function hundleDeletetag(id) {
        var form = document.getElementById('deleteTagForm')
        form.action = id
        $('#deleteModal').modal('show')
    }
</script>
@stop