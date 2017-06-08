@extends('layouts.app')
@section('content')

<link href="{{asset('/EX/font/send/iconfont.css')}}" type="text/css" rel="stylesheet">

<div class="main">
    <!-- left-bar-->
    <div class="left-bar">
        <div class="cell" style="height: 33px;font-size: 13px">
            <span class="fb">EX&nbsp;&nbsp;>&nbsp;&nbsp;创建新话题</span>
        </div>
        <!-- title-->
        <div class="cell">
            <div class="float-right">120</div>
            <span style="display: flex">标题</span>
        </div>

        <div class="cell">
            <textarea class="title-textarea no_padding" rows="1" maxlength="120" name="title" placeholder="请输入标题"></textarea>
        </div>

        <div class="cell">
            <div class="float-right">20000</div>
            <span style="display: flex">正文</span>
        </div>
        <div class="cell" style="text-align: left">
            <div id="editor">123</div>
        </div>
        <div class="cell" style="text-align: right">
            <button type="button">
                <i class="iconfont icon-fasong"></i>
                &nbsp;&nbsp;
                发送
                &nbsp;&nbsp;
            </button>
        </div>
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

    var summernote = $('#editor').summernote({
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

    $('.dropdown-toggle').dropdown();

    summernote.summernote("code","不能上传图片");
    $('#dropping').summernote({
        dialogsInBody: true
    });

    function sendFile(file) {
        var data = new FormData();
        data.append("file",file);
        data.append("_token",$("#token").val());

        $.ajaxSetup({
            header:{
                "X-CSRF-TOKEN":$("meta[name='csrf-token']").attr("content")
            }
        });

        $.ajax({
            data:data,
            type:"post",
            url:"{{url('/sm/upload')}}",
            async:false,
            cache: false,
            contentType: false,
            processData: false,
            timeout:30000,
            success:function (url) {
                summernote.summernote("insertImage",url,"filename");
            },
            error:function (result) {
                console.log("上传失败");
            }
        });

    }


</script>
@endsection