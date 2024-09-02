<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="info-nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>Home</b>
                </a>
                <a class="navbar-brand" href="{{ url('/profile') }}">
                    <b>Profile</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-custom" id="left-side">
                    <nav class="bg-light sidebar" id="left-nav">
                        <ul class="nav flex-column" id="side">

                        <div  class="outer-square-box">
                            <li id="per-id" class="nav-item {{ request()->is('fill-personal-details') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/fill-personal-details') }}">
                                    <div class="square-box">
                                        <p>Personal Information</p>
                                    </div>
                                </a>
                            </li>
                            <li id="str-id" class="nav-item {{ request()->is('fill-strengths') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/fill-strengths') }}">
                                    <div class="square-box">
                                        <p>Strengths</p>
                                    </div>
                                </a>
                            </li>
                        </div>

                        <div  class="outer-square-box">

                            <li id="skill-id" class="nav-item {{ request()->is('fill-skills') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/fill-skills') }}">
                                    <div class="square-box">
                                        <p>Skills</p>
                                    </div>
                                </a>
                            </li>
                            <li id="edu-id" class="nav-item {{ request()->is('fill-education') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/fill-education') }}">
                                    <div class="square-box">
                                        <p>Education</p>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div  class="outer-square-box">
                            <li id="exp-id" class="nav-item {{ request()->is('fill-experience') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/fill-experience') }}">
                                    <div class="square-box">
                                        <p>Experiences</p>
                                    </div>
                                </a>
                            </li>
                            <li id="pro-id" class="nav-item {{ request()->is('fill-project') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/fill-project') }}">
                                    <div class="square-box">
                                        <p>Projects</p>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div  class="outer-square-box">
                            <li id="cv-id" class="nav-item {{ request()->is('show-cv') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/show-cv') }}">
                                    <div class="square-box">
                                        <p>Your CV</p>
                                    </div>
                                </a>
                            </li>
                        </div>
                        </ul>
                    </nav>
                </div>
                
                <div class="col-md-9" id="body-content">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
