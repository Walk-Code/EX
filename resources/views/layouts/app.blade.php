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
<style type="text/css">
   /* html, body {
        min-height: 100%;
        margin: 0;
    }*/

</style>

<body>
    <div id="app">
        @include('layouts.header')
        <div class="wrapper">
        @yield('content')
        <div style="height: 50px"></div>
        </div>
        @include('layouts.footer')
    </div>
    <!-- Scripts -->
    <!-- progress bar-->

    <script src="{{asset('/EX/plugins/pjax/jquery.pjax.js')}}"></script>
    <script>
        /*$("#menu").on("click",function () {
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

        });*/
    </script>

</body>

</html>
