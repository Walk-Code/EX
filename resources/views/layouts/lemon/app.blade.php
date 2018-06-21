<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lemon</title>
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}" media="all">
    <script src="{{ asset('layui/layui.js') }}"></script>
    <script src="{{ asset('/EX/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <style type="text/css">

        .lemon-upload {
            margin-top: 50px;
        }

        .lemon-center {
            text-align: center;
        }

        .lemon-upload-result {
            margin-top: 15px;

        }
        .lemon-upload-result-item {
            padding: 10px;
        }
        .lemon-label {
            padding: 9px 15px;
            font-weight: 500;
        }
    </style>
</head>
<body class="layui-bg-cyan">
    @yield('content')
</body>
</html>