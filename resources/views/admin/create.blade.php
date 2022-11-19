@extends('adminlte::page')

@section('title', 'Create')

@section('content_header')
@stop

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid ">
        <div class="row flex justify-content-center">
           
       
            <div class="col-md-10">
 @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
                <!-- jquery validation -->

                <div class="card card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">{{isset($products) ? 'Edit Product' : 'Add Product'}}</h3>

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{isset($products) ? route('product.update', $products->id ) : route('product.store')}}" name="form" id="form" method="POST" class="dropzone"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($products))
                        @method('PUT')
                        @endif
                        <div class="card-body row">
                            <div class="col-md-6 shadow">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control " id="name"
                                        placeholder="Product Name" value="{{isset($products) ? $products->name : ''}}">
                                    @if ($errors->any())
                                    @foreach ($errors->get('name') as $error)
                                    <small class="text-danger " id="errormsg">{{$error}}</small>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="catagory">Catagory</label>

                                    <select name="catagory[]" multiple="multiple" id="catagory"
                                        class="select2 form-control w-80px" data-placeholder="Catagory">
                                        @foreach ($catagories as $catagory)
                                        <option value="{{$catagory->id}}" @if (isset($products)) @if ($catagory->id ==
                                            $products->hasCatagory($catagory->id))
                                            selected
                                            @endif
                                            @endif
                                            >
                                            {{$catagory->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->any())
                                    @foreach ($errors->get('catagory') as $error)
                                    <small class="text-danger " id="errormsg">{{$error}}</small>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <div class="row">
                                        <div class="col-md-6 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Birr</span>
                                            </div>
                                            <input type="text" class="form-control" name="price" id="price"
                                                placeholder="Price"
                                                value="{{isset($products) ? $products->price : ''}}">
                                            
                                        </div>

                                        <div class="col-md-6 input-group">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text">Discount</span>
                                            </div>
                                            <input type="text" class="form-control" name="discount" id="discount"
                                                placeholder="Discount"
                                                value="{{isset($products) ? $products->discount : 0}}">
                                            
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                            @foreach ($errors->get('price') as $error)
                                            <small class="text-danger" id="errormsg">{{$error}}</small>
                                            @endforeach
                                            @endif
                                            @if ($errors->any())
                                            @foreach ($errors->get('discount') as $error)
                                            <small class="text-danger " id="errormsg">{{$error}}</small>
                                            @endforeach
                                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" class="form-control " id="quantity"
                                        placeholder="Quantity" value="{{isset($products) ? $products->quantity : ''}}">
                                    @if ($errors->any())
                                    @foreach ($errors->get('quantity') as $error)
                                    <small class="text-danger " id="errormsg">{{$error}}</small>
                                    @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 shadow">
                                <div class="form-group">
                                    <label for="priority">Priority <small> (optional)</small></label>

                                    <select name="priority" id="priority" class="form-control">
                                        <option value="" @if (isset($products)) @if ($products->priority == '') selected @endif @endif>None</option>
                                        <option value="6" @if (isset($products)) @if ($products->priority == 6) selected @endif @endif>New</option>
                                        <option value="1" @if (isset($products)) @if ($products->priority == 1) selected @endif @endif>1</option>
                                        <option value="2" @if (isset($products)) @if ($products->priority == 2) selected @endif @endif>2</option>
                                        <option value="3" @if (isset($products)) @if ($products->priority == 3) selected @endif @endif>3</option>
                                        <option value="4" @if (isset($products)) @if ($products->priority == 4) selected @endif @endif>4</option>
                                        <option value="5" @if (isset($products)) @if ($products->priority == 5) selected @endif @endif>5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="images[]" class="form-control" multiple="" id="image">
                                    @if ($errors->any())
                                    @foreach ($errors->get('images') as $error)
                                    <small class="text-danger " id="errormsg">{{$error}}</small>
                                    @endforeach
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" name="description" rows="4" class="form-control"
                                        id="description">{{isset($products) ? $products->description : ''}}</textarea>
                                    @if ($errors->any())
                                    @foreach ($errors->get('description') as $error)
                                    <small class="text-danger " id="errormsg">{{$error}}</small>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer d-flex justify-content-end">
                            <input type="submit" value="Submit" class="btn btn-primary mr-2">
                            <input type="reset" value="Clear" class="btn btn-secondary mr-2">
                            <a href="{{route('product.index')}}" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
                @if (isset($products))
                <div class="col-md-12">
                    <ul class="list-inline">
                        @foreach ($products->photos as $object)
                        <li class="list-inline-item">
                            <img src="{{ asset('img/products/'.$object->photo_path) }} " alt="Product" width="200px"
                                class="img-responsive mb-2">
                        </li>
                        @endforeach

                    </ul>
                </div>

                @endif
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
<link rel="stylesheet" href="{{asset('vendor/summernote/summernote-bs4.css')}}">
<style></style>

@stop

@section('js')
<script src="{{asset('vendor/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote({
        toolbar: [
  ['style', ['style']],
  ['font', ['bold', 'underline', 'clear']],
  ['font', ['strikethrough', 'superscript', 'subscript']],
//   ['fontname', ['fontname']],
  ['color', ['color']],
  ['para', ['ul', 'ol', 'paragraph']],
//   ['table', ['table']],
  ['insert', ['link']],
//   ['view', ['fullscreen', 'codeview', 'help']],
]
      });
    
    })
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    
    })
   
</script>
<script src="{{asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

@stop