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
    <form class="layui-form" action="{{ url("/lemon/model",["filename" => $fileName]) }}" data-auto="" method="post" id="template">
        {{ csrf_field() }}
        <input type="hidden" name="filename" value="{{ $fileName }}"/>
        <input type="hidden" name="type" value="1"/>
        @foreach($field as $value)
        <div class="layui-form-item lemon-center" style="margin-top: 10px">
            <label class="layui-form-label">{{ $value }}</label>
            <div class="layui-input-inline">
                <input type="text" name="{{ $value }}" placeholder="请输入" autocomplete="off" class="layui-input ">
            </div>
        </div>
        @endforeach
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="*" onclick="">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('layui/layui.js') }}" ></script>
<script src="{{ asset('/EX/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script>

    layui.use("layer", function () {
        $("#template").submit(function () {
            $("#template").submit();

//            parent.layer.closeAll("iframe");
        });
    });

</script>
</body>
