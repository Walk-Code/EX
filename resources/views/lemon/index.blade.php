@extends("layouts.lemon.app")
@section("content")
<!--<form action="{:ulemonport/add')}" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" class="layui-btn" id="upload">
        <i class="layui-icon">&#xe67c;</i>上传文件
    </button>
</form>-->
<div class="layui-container">
    <div class="lemon-upload lemon-center">
        <button type="button" class="layui-btn" id="upload">
            <i class="layui-icon">&#xe67c;</i>上传文件
        </button>
    </div>
    <div class="lemon-upload-result lemon-center">
        @foreach($entries as $entry)
        <div class="lemon-upload-result-item">
            <label class="lemon-label">{{ $entry->filename }}</label>
            <input type="hidden" value='1' />
            <button type="button" class="layui-btn layui-btn-xs watch">
                <i class="layui-icon">&#xe63c;</i>查看
            </button>
        </div>
        @endforeach
    </div>
</div>

<script>

    layui.use(["upload","form"], function(){
        var upload = layui.upload;

        $.ajaxSetup({
            header: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        });

        upload.render({
            elem: '#upload',
            url: '{{url("/lemon/add")}}',
            accept: 'file',
            before: function (input) {
                layer.load();
            },
            done: function(data){
                //上传完毕回调
                layer.closeAll("loading");

                if (data.code == 1){
                    //上传成功
                    var content = " <div class='lemon-upload-result-item'>" +
                        "<label class='lemon-label'>"+data.filename.name+"</label>" +
                        "<input type='hidden' value='"+data.filename.id+"' />"+
                        "<button type='button' class='layui-btn layui-btn-xs watch' id='watch'>" +
                        "<i class='layui-icon'>&#xe63c;</i>查看" +
                        "</button>" +
                        "</div>";

                    $(".lemon-upload-result").append(content);

                }else if (data.code == 2) {
                    //文件异常
                    layer.msg("上传失败："+data.msg);
                }else if (data.code == 0) {
                    layer.msg("上传失败：未知错误");
                }

            },
            error: function(err){
                layer.closeAll("loading");
                console.log(err.getErrorCorrectPolynomial());
            }
        });

        $(document).on("click",".watch",function () {
            var filename = $(this).parent().find("label").text();
            layer.open({
                type: 2,
                title: "参数",
                area: ['400px', '450px'],
                content: "{{url('/lemon/model/')}}/"+filename
            });
        });

    });

</script>
@endsection
