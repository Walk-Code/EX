@extends('layouts.app')
@section('content')

<link href="{{asset('/EX/font/send/iconfont.css')}}" type="text/css" rel="stylesheet">
<link type="text/css" href="{{asset('EX/font/swith/iconfont.css')}}" rel="stylesheet"/>

<div class="main">
    <!-- left-bar-->
    <div class="left-bar">
        <div class="cell" style="height: 33px;font-size: 13px">
            <span class="fb"><a href="/">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;创建新话题</span>
        </div>
        <!-- title-->
        <div class="cell">
            <div class="float-right">120</div>
            <span style="display: flex">标题</span>
        </div>
        <form action="{{url('new')}}" method="post" id="new">
            {{csrf_field()}}
            <div class="cell">
                <textarea class="title-textarea no_padding" rows="1" maxlength="120" name="title" placeholder="请输入标题"></textarea>
            </div>

            <div class="cell">
                <div class="float-right">20000</div>
                <span style="display: flex">正文</span>
            </div>
            <div class="cell" style="text-align: left" id="topicContent">
                <div id="editor">
                </div>
            </div>
            <div class="cell" style="text-align: right" data-id="rich">
                <button type="button" id="btn-mess" class="reply-button" style="float: left" onclick="change(this);">
                    <i class="iconfont icon-qiehuan"></i>
                    富文本编辑
                </button>
                <button type="button" class="reply-button" onclick="send();">
                    <i class="iconfont icon-fasong"></i>
                    &nbsp;&nbsp;
                    发送
                    &nbsp;&nbsp;
                </button>
            </div>
            <input type="hidden" id="content" name="content"/>
        </form>
    </div>
    <div class="sep20-flex-width"></div>
    <!-- right-bar-->
    <div class="right-bar">
        注意事项版块
    </div>
    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
</div>


<script type="text/javascript" src="{{ asset('/EX/plugins/summernote/summernote.min.js') }}"></script>


<script type="text/javascript">

    initSummernote();
    $('.dropdown-toggle').dropdown();

    function send() {
         $("#content").val( summernote.summernote("code"));
         $("#new").submit();
     }

    //切换回复框格式
    function change(obj) {
        console.log($(obj).parent().attr("data-id"));
        $id = $(obj).parent();

        if($id.attr("data-id") == "md"){
            $("#editor").empty();
            initSummernote(0);
            $id.attr("data-id","rich");
            summernote.summernote("destory");
            $("#btn-mess").html('<i class="iconfont icon-qiehuan"></i>markdown');
            $("#editor_type").val(2);

        }else if($id.attr("data-id") == "rich"){
            summernote.summernote("destroy");
            $("#topicContent").append('<textarea name="reply" class="reply-comment" id="reply" style="height: 110px;width: 100%">'+
                    '</textarea>');
            $id.attr("data-id","md");
            $("#btn-mess").html('<i class="iconfont icon-qiehuan"></i>富文本编辑');
            $("#editor_type").val(1);

        }


    }

    function initSummernote(type) {
        summernote = $('#editor').summernote({
            height: 500,                 // set editor height
            width: "100%",                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,
            focus: true,
            lang:'zh-CN',
            toolbar:[
                ['misc',['undo','redo','codeview']],
                ['style', ['style','bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['link', ['linkDialogShow', 'unlink']],
                ['insert',['picture','hr','table']]
            ],
            callbacks: {
                onImageUpload: function (file) {
                    sendFile(file[0]);
                }
            }
        });

    }

    function sendFile(file) {
        var data = new FormData();
        data.append("file", file);
        data.append("_token", $("#token").val());

        $.ajaxSetup({
            header: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        });

        $.ajax({
            data: data,
            type: "post",
            url: "{{url('/sm/upload')}}",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            timeout: 30000,
            success: function (url) {
                summernote.summernote("insertImage", url, "filename");
            },
            error: function (result) {
                console.log("上传失败");
            }
        });
    }


</script>
@endsection