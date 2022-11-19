<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="keywords" content="">
    
        <title>SAMY Electronics</title>
    
        <!-- Styles -->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
    
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
        @yield('links')

        <style>
            .ribbon{
            width: 150px;
            height: 150px;
            position: absolute;
            top: -10px;
            right: -10px;
        }
        .ribbon span{
            width: 225px;
            padding: 5px 0px;
            background: #3cd458;
            display: block;
            position: absolute;
            top: 20px;
            left: -10px;
            transform: rotate(45deg);
            text-align: center;
            text-transform: capitalize;
            font-weight: bold;
        }
        
        .ribbon:after,.ribbon:before{
            content: '';
            border-top: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #738f12;
            border-left: 5px solid #738f12;
            position: absolute;
        }
        .ribbon:before{
            bottom: 0%;
            right: 0%;
        }
        .ribbon:after{
            top: 0%;
            left: 0%;
        }
            </style>
    
    </head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg fixed-top bg-dark py-0">
        <div class="container">

            <div class="navbar-left rounded">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand " href="{{url('/')}}">
                  <img class="" src="{{asset('final3.png')}}" width="65px" alt="logo">
                </a>
            <a class="navbar-brand " href="{{url('/')}}">
                <div class="">
                    <h1 class="" style="font-family: 'Piedra', cursive; color: darkblue"><strong>SAMY</strong><small>Electronics</small></h1>
                </div>
                </a>
            </div>

            <section class="navbar-mobile">
                <nav class="nav nav-navbar ml-auto">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                    <a class="nav-link active" href="{{route('all')}}">Products</a>
                    <a class="nav-link" href="{{url('/#About')}}">About</a>
                    <a class="nav-link" href="{{url('/#Contact')}}">Contact</a>
                </nav>

                <span class="navbar-divider"></span>

                <div>
                    @guest
                    <a class="btn btn-sm btn-round btn-primary ml-lg-4 mr-2"
                    href="{{ route('login') }}">Login</a>
                    @else
                    <a class="nav-link" href="{{ route('home') }}">Dashboard</a>

                    @endguest
                    
                </div>
            </section>

        </div>
    </nav>
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer pt-5 pb-3 text-daek bg-light">
        <div class="container">
            <div class="row gap-y">

                <div class="col-xl-6">
                    <div class="d-flex justify-content-end">
                
                        <table >
                            <tr>
                                <td class="text-right pr-2">Developed by:</td>
                                <th>Amanuel Desalegn</th>
                            </tr>
                            <tr>
                                <td class="text-right pr-2"><i class="fa fa-phone text-primary"></i> </td>
                                <td> +251 963732919</td>
                            </tr>
                            <tr>
                                <td class="text-right pr-2"><i class="fa fa-envelope text-primary"></i></td>
                                <td> Amandesalegnb@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="text-right pr-2"><a href="https://www.instagram.com/aman_desalegnb" target="_blank"><i class="fab fa-instagram text-danger"></i></a></td>
                                <td class="">@aman_desalegnb</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-xl-6 order-md-first">
                    <h6 class="mb-4"><strong>We Are Awesome</strong></h6>
                    <p>We’re a team of experienced designers and photographers. We can combine beautiful, modern
                        designs, stunning Photography.</p>
                   
                </div>
                
               
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <h6 class="opacity-70">© 2020 SAMY Electronics. All rights reserved.</h6>
        </div>
    </footer><!-- /.footer -->

    <!-- Scroll top -->
    <button class="btn btn-circle btn-primary scroll-top"><i class="fa fa-chevron-up"></i></button>


    <!-- Scripts -->
    <script src="{{asset('js/main.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    @yield('script')

</body>

</html>