@extends('layouts.app')
@section('content')
    <link type="text/css" href="{{asset('EX/iconfont/iconfont.css')}}" rel="stylesheet"/>
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
                <div class="box" style="margin-top: 45px">
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
                    <!-- comments -->
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

                                            <a href="#" onclick="reply('test');">
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
                </div>
            </div>
            <!-- sidebar-->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas no_padding">

                <div class="box">
                    <!-- 个人信息 -->
                    <div class="cell">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody>
                            <td width="48" valign="top">
                                <a href="#"><img src="//v2ex.assets.uxengine.net/avatar/24c2/278e/71189_large.png?m=1442725074" class="avatar" border="0" align="default" style="max-width: 48px; max-height: 48px;"></a>
                            </td>
                            <td width="10" valign="top"></td>
                            <td width="auto" align="left">
                                <span class="bigger">
                                    <a href="#">walk_code</a>
                                </span>
                            </td>
                            </tbody>
                        </table>
                        <div class="sep10"></div>
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top: 5px">
                            <tbody>
                            <tr>
                                <td width="33%" align="center">
                                    <a href="#" class="dark" style="display: block">
                                        <span class="bigger">0</span>
                                        <div class="sep3"></div>
                                        <span class="">节点收藏</span>
                                    </a>
                                </td>
                                <td width="34%" align="center" style="border-left: 1px solid rgba(100, 100, 100, 0.4); border-right: 1px solid rgba(100, 100, 100, 0.4);">
                                    <a href="#" class="dark" style="display: block">
                                        <span class="bigger">43</span>
                                        <div class="sep3"></div>
                                        <span class="">收藏主题</span>
                                    </a>
                                </td>
                                <td width="33%" align="center">
                                    <a href="#" class="dark" style="display: block">
                                        <span class="bigger">3</span>
                                        <div class="sep3"></div>
                                        <span class="">特别关注</span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- 活跃度 -->
                    <div class="cell">
                        <div style="width:272px;background-color: #f0f0f0; vertical-align: middle;height: 3px;display: inline-block">
                            <div style="background-color: #ccc;width: 36px;height: 3px;"></div>
                        </div>
                    </div>
                    <!--创建新主题 -->
                    <div class="cell">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody>
                            <tr>
                                <td width="32">
                                    <a href="#">
                                        <img src="/static/img/flat_compose.png?v=7d21f0767aeba06f1dec21485cf5d2f1" width="32" border="0">
                                    </a>
                                </td>
                                <td width="10"></td>
                                <td width="auto" valign="middle" align="left">
                                    <a href="#">创建新主题</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- 金币模块 -->
                    <div class="inner">
                        <a href="#" class="message">0条未读消息</a>
                        <div style="float: right">
                            <a href="#" class="assets">
                                2&nbsp;<img src="https://ooo.0o0.ooo/2017/05/17/591bfa8220346.png" alt="G" align="absmiddle" border="0" style="padding-bottom: 2px;">
                                2&nbsp;<img src="https://ooo.0o0.ooo/2017/05/17/591bfa821e8fd.png" alt="S" align="absmiddle" border="0" style="padding-bottom: 2px;">
                                2&nbsp;<img src="https://ooo.0o0.ooo/2017/05/17/591bfa821f9f3.png" alt="B" align="absmiddle" border="0">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function reply(user) {
            
        }


        
    </script>
@endsection