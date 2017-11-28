<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Lemon</title>
    <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css?t=1510786361436" media="all">

    <style type="text/css">
        .lemon-center {
            text-align: center;
        }

        .layui-form-label {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="layui-container">
    <object data="{{ $pdf }}" type="application/pdf">
        <iframe src="https://docs.google.com/viewer?url=your_url_to_pdf&embedded=true" width="300px" height="400px"></iframe>
    </object>
</div>
<script src="{{ asset('layui/layui.js') }}" ></script>
<script src="{{ asset('/EX/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script>

</script>
</body>
