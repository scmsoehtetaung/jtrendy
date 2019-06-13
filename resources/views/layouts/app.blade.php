<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<style>
.dropdown-menu {
    min-width: 4rem !important;
    height: 40px !important;
    background-color:#063f5b !important;
}
.dropdown-menu a:hover{
    background-color:#6b9dbb !important;
}
#navbarDropdown{
    background-color:#063f5b;
}
#navbarDropdown:hover{
    background-color:#6b9dbb !important;
}
body { padding-top: 50px; }
.navbar.my-navbar {
 background-color:#063f5b;
 border:#2bbbad;
}
.navbar-brand{
    color:white;
}
.nav-item .nav-link:hover{
    background-color:#6b9dbb;
}
#app .navbar-nav li a {
	text-transform: capitalize;
	color: #fff;
	transition: background-color .2s, color .2s;
}

#app .navbar-nav li.active  a {
	background-color:#6b9dbb;
	color: #fff;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar my-navbar navbar-fixed-top">
            <div class="container-fluid">
           
            @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    Hello From jTrendy!
                </a>
                @elseif(auth()->user()->user_type== 1)
                <a class="navbar-brand" href="{{url('/profile', [Auth::user()->id])}}">
                {{'Hello '}}
                {{Auth::user()->name}}
                {{'!'}}
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/profile', [Auth::user()->id]) }}">
                {{'Hello  '}}
                {{Auth::user()->name}}
                {{'!'}}
                @endguest
             
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"> </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right ">
                        <!-- Authentication Links -->
                        @guest    
                        @elseif(auth()->user()->user_type== 1)
                            <li class="nav-item {{ request()->routeIs('user') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('user') }}">{{ __('User') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('registeruser') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('registeruser') }}">{{ __('Register') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('songList') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('songList') }}">{{ __('Song List') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('uploads') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('uploads') }}">{{ __('Upload Song') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('uploadedsong') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('uploadedsong') }}">{{ __('Uploaded Song') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('popularList') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('popularList') }}">{{ __('Popular Songs') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('songcategory') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('songcategory') }}">{{ __('Category List') }}</a>
                            </li>
                            <li class="dropdown nav-item">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i>{{ Auth::user()->name }}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-default" role="menu" aria-labelledby="menu1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>  
                            </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                </form>
                               @else
                           
                               
                            <li class="nav-item {{ request()->routeIs('uploadedsong') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('uploadedsong') }}">{{ __('Uploaded Song') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('popularList') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('popularList') }}">{{ __('Popular Songs') }}</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('songcategory') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('songcategory') }}">{{ __('Category List') }}</a>
                            </li>
                            <li class="dropdown nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i>{{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>    
                            </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                </form>
                        @endguest
                    </ul>
                    
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
   
</body>
</html>
