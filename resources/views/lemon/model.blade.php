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
        @foreach($field as $key=>$value)
        <div class="layui-form-item lemon-center" style="margin-top: 10px">
            <label class="layui-form-label">{{ $value["filed"] }}</label>
            <div class="layui-input-inline">
                <input type="text" name="{{ $value["filed"] }}" placeholder="请输入" value="{{ $value["value"] }}" autocomplete="off" class="layui-input ">
            </div>
        </div>
        @endforeach
        <div class="layui-form-item">
            <div class="layui-input-block">
                @if(empty($pdf))
                <button class="layui-btn" type="submit" onclick="">提交</button>
                @else
                <button class="layui-btn preview">预览</button>
                @endif
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
    <input type="hidden" value="{{ asset("PDF")."/".$pdf }}" id="pdf" >
</div>
<script src="{{ asset('layui/layui.js') }}" ></script>
<script src="{{ asset('/EX/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{ asset('Lemon/js/pdf/build/pdf.js') }}" ></script>
<script src="{{ asset('Lemon/js/pdf/build/pdf.worker.js') }}" ></script>
<script>


    layui.use("form", function(){

      $(document).on("click",".preview",function () {
          var pdf = $("#pdf").val();
          window.open("{{ asset("Lemon/js/pdf/web/viewer.html")."?file="}}"+pdf);
      })
    });



</script>
</body>
