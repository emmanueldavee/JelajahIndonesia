<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jelajah Indonesia</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Jelajah Indonesia
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categories as $category)
                                    <a href="/categories/{{ $category->id }}" class="dropdown-item">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        @if(auth()->user())
                            @if(auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a href="{{ url('admin/user') }}" class="nav-link">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/admin') }}" class="nav-link">Admins</a>
                                </li>
                            @else
                                
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->role == 'user')
                                    <a href="{{url('users/'.auth()->user()->id.'/blogs')}}" class="dropdown-item">My Blogs</a>
                                    @endif
                                    <a href="{{url('users/edit')}}" class="dropdown-item">Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-0">
            <div class="container">
                @if(session()->has('success'))
                    <div class="alert alert-success my-4">
                        {{ session()->get('success') }}
                    </div>
                @endif
                
                @if(session()->has('error'))
                    <div class="alert alert-danger my-4">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>

            @yield('content')
        </main>

        <div class="w-100 footer mt-5">
            <div class="container py-4 sub">
                <div class="row sub-heading">
                    <div class="col-7 pb-4">
                        <div class="row">
                            <div class="col-3">
                                <strong class="d-block mb-2 footer-title">Service</strong>
                                <div class="mb-1">Help</div>
                                <div class="mb-1">Customer Service</div>
                            </div>
                            <div class="col-3">
                                <strong class="d-block mb-2 footer-title">Source</strong>
                                <div class="mb-1">Pricing</div>
                            </div>
                            <div class="col-3">
                                <strong class="d-block mb-2 footer-title">Company</strong>
                                <div class="mb-1">About Us</div>
                                <div class="mb-1">Contact Us</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 d-flex justify-content-between">
                    <div>
                        <span>&copy; JelajahIndonesia</span>
                        <span class="ml-4">Terms and Conditions</span>                        
                    </div>
                    <div>
                        <i class="fab fa-instagram mr-1 d-inline-block"></i>
                        <i class="fab fa-youtube mr-1 d-inline-block"></i>
                        <i class="fab fa-facebook-f mr-3 d-inline-block"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
