@extends('layouts.app')

@section('content')
    <style type="text/css" rel="stylesheet">
       a.count_ex:link, a.count_ex:active {
            color: white;
            background-color: #aab0c6;
            display: inline-block;
            padding: 2px 10px 2px 10px;
            -moz-border-radius: 12px;
            -webkit-border-radius: 12px;
            border-radius: 12px;
            text-decoration: none;
            margin-right: 5px;
            word-break: keep-all;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div>
                        <table>
                            <tbody>
                                <tr>
                                    <td width="48" valign="top" align="center">
                                        <a href="#">
                                            <img src="//v2ex.assets.uxengine.net/avatar/2e1b/24a6/102617_normal.png?m=1444979047" class="avatar" border="0" align="default">
                                        </a>
                                    </td>
                                    <td width="10"></td>
                                    <td width="auto" valign="middle">
                                        <span class="item_title">
                                            <a href="/t/360617#reply11">安卓手机装了框架后的“黑域”和现在国产 ROM 自带的限制自启动的功能是否相同？</a>
                                        </span>
                                        <div class="sep5"></div>
                                        <span class="small">
                                            <div class="votes"></div>
                                            <a class="node" href="#">android</a>
                                            &nbsp;·&nbsp;
                                            <strong>
                                                <a href="#">cyberdaemon</a>
                                            </strong>
                                            &nbsp;·&nbsp;刚刚&nbsp;·&nbsp;最后回复来之
                                            <strong>
                                                <a href="#">TakaLv</a>
                                            </strong>
                                        </span>
                                    </td>
                                    <td width="120"></td>
                                    <td width="70" align="right" valign="middle">
                                        <a href="#" class="count_ex" style="text-decoration: none;">63</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas no_padding" id="sidebar" style="background-color: #fff;">
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
                                    <a href="#">Kylinsun</a>
                                </span>
                            </td>
                        </tbody>
                    </table>
                    <div class="sep10"></div>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
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
                <!-- 金币 -->
                <div class="inner">
                    <a href="#">0条未读消息</a>
                    <div style="float: right">
                        <a href="#" class="assets">
                            2<img src="//v2ex.assets.uxengine.net/static/img/gold.png" alt="G" align="absmiddle" border="0" style="padding-bottom: 2px;">
                            2<img src="//v2ex.assets.uxengine.net/static/img/silver.png" alt="S" align="absmiddle" border="0" style="padding-bottom: 2px;">
                            2<img src="//v2ex.assets.uxengine.net/static/img/bronze.png" alt="B" align="absmiddle" border="0">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
