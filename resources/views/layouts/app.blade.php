<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

        <div class="container">
            <div class="row">
            @if(Auth::check())
            <div class="col-md-4">
            <a href="{{route('discussions.create')}}" class="btn btn-info form-control">Creat a new Discussion</a>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Channels
                    </div>
                    @if($channels->count() > 0)
                    <div class="panel-body">
                        <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="/forum" style="text-decoration:none">Home</a>
                                </li>
                                <li class="list-group-item">
                                        <a href="/forum?filter=me" style="text-decoration:none">My discussions</a>
                                    </li>

                                    <li class="list-group-item">
                                            <a href="/forum?filter=solved" style="text-decoration:none">Answered discussions</a>
                                        </li>
                                <li class="list-group-item">
                                        <a href="/forum?filter=unsolved" style="text-decoration:none">Unsolved discussions</a>
                                    </li>
                            
                            @foreach($channels as $channel)
                            <li class="list-group-item">
                            <a href="{{route('channel',['slug'=>$channel->slug])}}" style="text-decoration:none">
                            
                                    {{$channel->title}}
                            </a>

                            </li>
                            
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>

            </div>
            @endif
            <div class="col-md-8">

                @include('layouts.errors')

                @yield('content')
            </div>

        </div>

    </div>
        
    </div>
</body>
</html>

