@extends('layouts.app')
@section('content')

<link href="{{asset('/EX/font/send/iconfont.css')}}" type="text/css" rel="stylesheet">

<div class="main">
    <!-- left-bar-->
    <div class="left-bar">
        <div class="cell" style="height: 33px;font-size: 13px">
            <span style="float: left;">EX&nbsp;&nbsp;>&nbsp;&nbsp;创建新话题</span>
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

</div>


<script type="text/javascript" src="{{ asset('/EX/plugins/summernote/summernote.min.js') }}"></script>


<script type="text/javascript">

    //$(document).ready(function() {

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

        summernote.summernote("code","编辑器有问题");
        $('#dropping').summernote({
            dialogsInBody: true
        });
        function sendFile(file) {

        }
    //});

</script>
@endsection