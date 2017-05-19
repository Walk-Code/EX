@extends('layouts.app')
@section('content')
    <link type="text/css" href="{{asset('EX/iconfont/iconfont.css')}}" rel="stylesheet"/>
    <div class="container">

        <!-- main -->
        <div class="row">
            <!-- topic main-->
            <div class="col-sm-8">
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
            </div>
            <!-- sidebar-->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

            </div>
        </div>
    </div>

@endsection