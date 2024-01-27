<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
      body{
        font-family: cairo !important;
      }

        div.card{
            background-color: #F5EEE6;
        }
        div.card:hover {
            /* box-shadow: 0 10px 10px 	rgb(169,169,169); */
            box-shadow: 8px 28px 50px rgba(39,44,49,.07), 1px 6px 12px rgba(39,44,49,.04);
            transition: all .4s ease;
            
        }

      #items:hover
      {
        box-shadow: 8px 28px 50px rgba(39,44,49,.07), 1px 6px 12px rgba(39,44,49,.04);
        transition: all .4s ease;
        transform: scale(1.01);
      }

      input[type=text]:focus {
        border: none;
        transition: 0.2s;
        box-shadow: 8px 28px 50px rgba(39,44,49,.07), 1px 6px 12px rgba(39,44,49,.04) !important;
        }

      a:link{
        text-decoration: none;
      }
      a:hover{
        color: #808080 !important;
        transition: 0.2s;
        text-shadow: 2px 2px 5px #808080;
        transform: scale(1.1);
      }

      i{
        size: 24px;
      }

      .btn{
        transform: none !important;
        background-color: #E6A4B4 !important;
        border: none !important;
      }
      .btn:hover{
        color: #E6A4B4 !important;
        box-shadow: 8px 28px 50px rgba(39,44,49,.07), 1px 6px 12px rgba(39,44,49,.04) !important;
        background-color: white !important;
        border: solid 0.5px #E6A4B4 !important;
        transform: none !important;
      }

    </style>

    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg" style='background-color: #F5EEE6; color: black !important;'>
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>
            <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="{{route('itemgroup')}}">Groups</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="">Items</a>
            </li>
            
        </ul>
        </div>
        
        
        <div class="collapse navbar-collapse" >
        <ul class="navbar-nav">
            <li class="nav-item">
                <h3 class="nav-link active fw-bold" aria-current="page" href="#"">Tuwaiq</h3>
            </li>            
        </ul>
        </div>
        
        
        <div>
        @if(auth::guest())
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
        @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
        @endif

        </div>
    </div>
    </nav>

    <main class="py-0">
            <div class="row">
                <div class="col-sm-2" id='sidebar' style='background-color: #F5EEE6; color: black !important;'>
                                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                                        <span class="fs-5 d-none d-sm-inline" style='color: black !important;'>Menu</span>
                                    </a>
                                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                        <li class="nav-item">
                                            <a href="{{ route('controlpanel') }}" class="nav-link align-middle px-0">
                                            <i class="fs-4 bi-diagram-3 text-secondary""></i>  <span class="ms-1 d-none d-sm-inline" style='color: black;'>Stocks </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('addgitem') }}" class="nav-link align-middle px-0">
                                            <i class="fs-4 bi-folder-plus text-secondary"></i> <span class="ms-1 d-none d-sm-inline" style='color: black !important;'>Add group</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="additem" class="nav-link px-0 align-middle">
                                            <i class="fs-4 bi-file-earmark-plus text-secondary""></i> <span class="ms-1 d-none d-sm-inline" style='color: black !important;'>Add item</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bills') }}" class="nav-link px-0 align-middle ">
                                            <i class="fs-4 bi-receipt text-secondary"></i> <span class="ms-1 d-none d-sm-inline" style='color: black !important;'>Bills</span></a>
                                        </li>
                                    </ul>

                                
                                </div>
                        </div>
                <div class="col-sm-10">
                    @yield('content')
                </div>
            </div>
   
    </main>

</div>

</body>
</html>
