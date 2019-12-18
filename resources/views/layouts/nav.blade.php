<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ $page_title }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    
     <!-- Fonts -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <link rel="dns-prefetch" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #283E4A; color: #fff;">
            <div class="container">
                @guest
                <a  style="color: #10eaba;" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'cooking101') }}
                    {{-- <img src="/storage/logo/logo.png" alt="" style="width:50px; height:20px;"> --}}
                </a>
                @else 
                <a  style="color: #10eaba;" class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'cooking101') }}
                    {{-- <img src="/storage/logo/logo.png" alt="" style="width:50px; height:20px;"> --}}
                </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest 
                    <li class="nav-item"><a style="color: #fff;" class="nav-link" href="{{ url('/') }}">Home</a> </li>
                       @else 
                       <li class="nav-item"><a style="color: #fff;" class="nav-link" href="{{ route('home') }}">Home</a> </li>
                       @endguest
        
                       <li class="nav-item dropdown">
                            <a  style="color: #fff;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               How to  <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a  class="dropdown-item" href="{{ route('edo-recipes') }}">Make Edo Recipes  </a>
                                    <a  class="dropdown-item" href="{{ route('igbo-recipes') }}">Make Igbo Recipes  </a>
                            
                            </div>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a  style="color: #fff;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a  style="color: #fff;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item"><a style="color: #fff;" class="nav-link" data-toggle="modal" data-target="#addModal"><button style="border-radius: 5px; background-color: #227DC7; border: none; color: #fff;">Upload Recipe</button></a> </li>
                            <li class="nav-item dropdown">
                                <a  style="color: #fff;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a  class="dropdown-item" href="{{ route('dashboard') }}">Dashboard  </a>

                                    <a  class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload Recipe</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('save-recipe') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control">
                            </div>
    
                            <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control">
                            </div>
                        </div>
    
                        <div class="form-group row">
                                <div class="col-md-6">
                                        <label for="">Ingredients</label>
                                      <input type="text" name="ingredients" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Video</label>
                                  <input type="file" name="video" class="form-control">
                            </div>
                            </div>



       

                            <div class="form-group row">
                                <div class="col-md-6">
                                        <label for="">Nutritive Values</label>
                                      <input type="text" name="nutritive_values" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Time</label>
                                  <input type="text" name="time" class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                                 <div class="col-md-12">
                                     <select name="tribe" class="form-control" id="">
                                         <option value="">Select Tribe</option>
                                         <option value="edo">Edo Recipe</option>
                                         <option value="igbo">Igbo Recipe</option>
                                     </select>
                                 </div>
                            </div>


                            <div class="form-group row">
                                    <div class="col-md-12">
                                            <label for="">Details</label>
                                           <textarea name="details"  id="details" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
        <main>
            @yield('content')
        </main>
        
    </div>
</body>
</html>

<style>
        .jumbotron{
          background-image: url('/storage/bgs/bg2.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          height:   400px;
        }
    </style>

