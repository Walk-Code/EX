<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EX') }}</title>

    <link href="{{ asset('/EX/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('/EX/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="{{ asset('/EX/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('/EX/bootstrap/js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" href="{{asset('/EX/plugins/nprogress/nprogress.css')}}"/>
    <script src="{{ asset('/EX/plugins/nprogress/nprogress.js') }}"></script>

    <link href="{{ asset("/EX/plugins/summernote/summernote.css") }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/EX/ex.css') }}" rel="stylesheet">

    <!-- Scripts -->

    <script>
        window.Laravel = '{!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}';
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'EX') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">登录</a></li>
                            <li><a href="{{ route('register') }}">注册</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" id="menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- progress bar-->

    <script src="{{asset('/EX/plugins/pjax/jquery.pjax.js')}}"></script>
    <script>
        $("#menu").on("click",function () {
            $(this).parent().addClass("open");
            $(this).prop("aria-expanded",true);
        });

        $(document).ready(function() {
            $(document).pjax('a', 'body');

            $(document).on('pjax:start', function() {
                NProgress.start();
            });

            $(document).on('pjax:end', function() {
                NProgress.done();
                //self.siteBootUp(); TODO BUG
            });

        });
    </script>
    @extends('layouts.footer')
</body>
</html>
