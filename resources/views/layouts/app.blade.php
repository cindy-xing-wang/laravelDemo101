<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                </li>
                                <form method="POST" action="{{ route('login') }}" class="mr-2">
                                    @csrf
                                    <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin1@gmail.com" required autocomplete="email" autofocus>
                                    <input hidden id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="11111111" required autocomplete="current-password">
                                    <button type="submit" class="btn btn-secondary">
                                        Login as Admin
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('login') }}" class="mr-2">
                                    @csrf
                                    <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="subadmin1@gmail.com" required autocomplete="email" autofocus>
                                    <input hidden id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="11111111" required autocomplete="current-password">
                                    <button type="submit" class="btn btn-secondary">
                                        Login as Sub-admin
                                    </button>
                                </form>
                                <br>
                                <form method="POST" action="{{ route('login') }}" class="mr-2">
                                    @csrf
                                    <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="staff1@gmail.com" required autocomplete="email" autofocus>
                                    <input hidden id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="11111111" required autocomplete="current-password">
                                    <button type="submit" class="btn btn-secondary">
                                        Login as Staff
                                    </button>
                                </form>
                            @endif
                            
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
