<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title class='text-white'>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
      body{
        font-family: cairo !important;
      }
      .card {
        display:inline-block !important;
        display: flex !important;
        background-color: #F5EEE6 !important;
        border: none !important;
        flex-wrap: wrap !important;
        align-items: stretch !important;
      }
      
      .row card-deck{
        flex: 1 0 auto !important;
      }
      #grcard:hover {
        background-color: #F3D7CA !important;
        box-shadow: 8px 28px 50px rgba(39,44,49,.07), 1px 6px 12px rgba(39,44,49,.04);
        transition: all .4s ease;
        transform: scale(1.01);
      }
      #items:hover
      {
        box-shadow: 8px 28px 50px rgba(39,44,49,.07), 1px 6px 12px rgba(39,44,49,.04);
        transition: all .4s ease;
        transform: scale(1.01);
      }


      input[type=text]:focus {
      border: 1.5px solid #555;
      transition: 0.2s;
      background-color: #e6e6e6;
      box-shadow: none !important;
      }

      a:link{
        text-decoration: none;
      }
      a:hover{
        color: #808080 !important;
        transition: 0.2s;
        transform: scale(1.1);
      }
      

      i{
        size: 24px;
      }
      i:hover{
        text-shadow: 2px 2px 5px #808080;
      }
      

      #add{
        transform: none !important;
        background-color: #E6A4B4 !important;
        border: none !important;
      }
      #add:hover{
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
    
    <nav class="navbar navbar-expand-lg" id='navbar' style='background-color: #F5EEE6;'>
            <div class="container-fluid">
              <a class="navbar-brand" style='color: black;'>CARE</a>
              
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" style='color: black;' aria-current="page"  href="{{ route('welcome') }}">Home </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style='color: black;' aria-current="page" href="{{ route('itemgroup') }}">Groups</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style='color: black;' aria-current="page" href="{{ route('item') }}">Items</a>
                  </li>
                 
                </ul>
              </div>

              <span>
                
                <a href="{{ route('checkout') }}" style='color: black;' class="nav-link active text-gray">
                  
                  <span class='text-danger fw-bold'>  {{ Session::get('countitem') }}  </span>
                  <span><i class="fs-5 bi-cart3"></i></span>
                </a>
              </span>

              <div class='ps-13'>
                @if(auth::guest())
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" style='color: black;' aria-current="page" href="{{route('login')}}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style='color: black;' href="{{route('register')}}">Register</a>
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
  
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>



