@extends('layouts.app')
@section('content')
    <link type="text/css" href="{{asset('EX/iconfont/iconfont.css')}}" rel="stylesheet"/>
    <link type="text/css" href="{{asset('EX/font/lock/iconfont.css')}}" rel="stylesheet"/>
    <link type="text/css" href="{{asset('EX/font/swith/iconfont.css')}}" rel="stylesheet"/>
    <div class="container">

        <!-- main -->
        <div class="row">
            <!-- topic main-->
            <div class="col-xs-12 col-sm-9">
                <div class="box">
                    <!-- header -->
                    <div class="header">
                        <div class="img-position">
                            <a href="#">
                                <img src="http://lorempixel.com/72/72/?99772" class="avatar" border="0" align="default">
                            </a>
                        </div>
                        <a href="#">EX</a>
                        <span>&nbsp;>&nbsp;</span>
                        <a href="#">test</a>
                        <div class="sep10"></div>
                        <h1>测试条目</h1>
                        <!-- 顶过或降 -->
                        <div>
                            <a href="javascript:" onclick="upVoteTopic();">
                                <span class="votes-box">&nbsp;&nbsp;<i class="iconfont icon-iconfontxiangshang01"></i>&nbsp;&nbsp;0&nbsp;&nbsp;</span>
                            </a>
                            &nbsp;&nbsp;
                            <a href="javascript:" onclick="downVoteTopic()">
                                <span class="votes-box">&nbsp;&nbsp;<i class="iconfont icon-down"></i>&nbsp;&nbsp;2&nbsp;&nbsp;</span>
                            </a>
                            <div class="small-message">
                                <a href="#">author</a>
                                <span>&nbsp;·&nbsp;刚刚&nbsp;&nbsp;·XXX次点击</span>
                            </div>
                        </div>

                    </div>
                    <!-- content-->
                    <div class="cell">
                        <div class="topic_content">
                            <div class="mark_body">
                                testtesttesttest
                            </div>
                        </div>
                    </div>
                    <!-- order-->
                    <div class="box-footer">
                        <span>X人收藏</span>&nbsp;&nbsp;
                        <a class="ex-topic-order">加入收藏</a>&nbsp;
                        <a class="ex-topic-order">Weibo</a>&nbsp;
                        <a class="ex-topic-order">忽略主题</a>&nbsp;
                        <a class="ex-topic-order">感谢</a>
                    </div>
                </div>
                <div class="sep20"></div>

                @if(isset($comments[0]))
                <div class="box">
                    <div class="cell">
                        <div style="float: right">
                            <a class="ex-topic-order" href="#">test tags</a>&nbsp;
                            <a class="ex-topic-order" href="#">test tags</a>&nbsp;
                            <a class="ex-topic-order" href="#">test tags</a>
                        </div>
                        <span style="font-size: 13px">
                            XX回复&nbsp;&nbsp;|&nbsp;&nbsp;直到&nbsp;2017-05-20 10:02:25 +08:00
                        </span>
                    </div>
                    <!-- comments layout-->

                    @foreach($comments as $k=>$comment)
                    <div class="cell">
                        <table cellpadding="0" cellspacing="0" width="100%" border="0">
                            <tbody>
                                <tr>
                                    <td width="48" valign="top" align="center">
                                        <img src="http://lorempixel.com/52/52/?99772" border="0" align="default">
                                    </td>
                                    <td width="10"></td>
                                    <td width="auto" valign="top" align="left">
                                        <div class="float-right">
                                            <!-- thanks -->
                                            <div class="thanks-area">
                                                <a href="">隐藏</a>&nbsp;&nbsp;
                                                <a href="">感谢回复</a>
                                            </div>&nbsp;&nbsp;

                                            <a href="#comment" onclick="reply('{{$comment->name}}');">
                                                <img src="{{asset('EX\images\reply.png')}}">
                                            </a>&nbsp;&nbsp;
                                            <span class="no">1</span>
                                        </div>
                                        <div class="sep3"></div>
                                        <strong>
                                           <a href="#">test user</a>
                                        </strong>
                                        &nbsp;&nbsp;
                                        <span>刚刚</span>
                                        <div class="sep5"></div>
                                        <!-- 回复内容-->
                                        <div class="reply-content">
                                            测试回复内容1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
                                            111111111111111112333333333333333333
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- not comments layout -->
                <div class="no-comment-layout">
                    暂未有人评论
                </div>
                @endif
                <!-- reply layout-->
                <div class="sep20"></div>
                <div class="box" style="margin-bottom: 50px">
                    <div class="cell">
                        <div class="float-right">
                            <a href="#app">
                                <strong>↑</strong>
                                回到顶部
                            </a>
                        </div>
                        添加一条新回复
                    </div>
                    @if(!Auth::check())
                        <div class="no-login-model">
                            <form action="{{url('login')}}" method="get">
                                <input type="hidden" name="path" value="{{rawurlencode($path)}}"/>
                                <button>
                                    <i class="iconfont icon-suotou"></i>
                                    登录
                                </button>
                            </form>
                        </div>
                    @else
                        <div id="comment" class="cell" data-id="md">
                            <div id="editor">
                                <textarea name="reply" class="reply-comment" id="reply" style="height: 110px;width: 100%">

                                </textarea>
                            </div>
                            <button class="reply-button">回复</button>
                            <button id="btn-mess" class="reply-button" style="float: right" onclick="change(this);">
                                <i class="iconfont icon-qiehuan"></i>
                                富文本编辑
                            </button>
                        </div>

                        <div id="comment" style="display: none" data-id="rich">

                        </div>

                    @endif
                    <div class="inner">
                        <div class="float-right">
                            <a href="{{url('/')}}" class="back-ex">
                                ←&nbsp;EX
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar-->
            @include('layouts.right')
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('/EX/plugins/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript">

        var summernote;


        function reply(name) {
            document.getElementById("reply").innerHTML = "@"+name+" ";
        }
        //切换回复框格式
        function change(obj) {
            //console.log($(obj).parent().attr("data-id"));
            $id = $(obj).parent();

            if($id.attr("data-id") == "md"){
                $("#editor").empty();
                initSummernote(0);
                $id.attr("data-id","rich");
                $("#btn-mess").html('<i class="iconfont icon-qiehuan"></i>markdown');

            }else if($id.attr("data-id") == "rich"){
                summernote.summernote("destroy");
                $("#editor").empty();
                $("#editor").append('<textarea name="reply" class="reply-comment" id="reply" style="height: 110px;width: 100%">'+
                        '</textarea>');
                $id.attr("data-id","md");
                $("#btn-mess").html('<i class="iconfont icon-qiehuan"></i>富文本编辑');

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