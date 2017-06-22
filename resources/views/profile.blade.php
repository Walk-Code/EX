@extends('layouts.app')
@section('content')
    <link href="{{asset("/EX/font/home/iconfont.css")}}" rel="stylesheet" type="text/css"/>
    <div class="main">
        <div class="right-bar">
            <div class="profile-box">
                <div class="profile-head">
                    <div style="width: 80px;text-align: left">
                        <a href="{{$user->head_img}}">
                            <img src="{{$user->head_img}}" class="avatar-radius" width="80px">
                        </a>
                    </div>
                    <div class="sep15-w"></div>
                    <div class="profile-head-content">
                        <div class="profile-head-item-w">
                            <div class="username">
                                <span>
                                    <strong>{{$user->name}}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="sep5"></div>
                        <div class="profile-head-item-h" style="align-items: flex-start">
                            <span class="profile-tag">主页</span>
                            <div class="sep5-w"></div>
                            <div class="profile-ex">
                                <a href="#">
                                    jfewfwwwwwwwwwwwww
                                </a>
                            </div>
                        </div>
                        <div class="profile-head-item-h" style="align-items: flex-start">
                            <span class="profile-tag">邮箱</span>
                            <div class="sep5-w"></div>
                            <div class="profile-ex">
                                <a href="#">
                                    {{$user->email}}
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="profile-head-body">

                    </div>
                </div>
                <div class="sep20"></div>
                <div class="profile-body">
                    <div class="profile-counter">
                        <a href="#">
                        <span>
                        0
                        </span>
                        <div class="sep5"></div>

                            节点收藏
                        </a>
                    </div>

                    <div class="profile-counter">
                        <a href="#">
                        <span>
                            {{count($user->store)}}
                        </span>
                        <div class="sep5"></div>

                        收藏主题
                        </a>
                    </div>

                    <div class="profile-counter">
                        <a href="#">
                        <span>
                            0
                        </span>
                        <div class="sep5"></div>

                        特别关注
                        </a>
                    </div>
                </div>
                <div class="sep20"></div>
                <div class="profile-footer">
                    <div style="width: 50%">
                        <a href="#" type="button" class="btn btn-info">
                            关注
                        </a>
                    </div>
                    <div style="width: 50%">
                        <a href="#" type="button" class="btn btn-danger">
                            block
                        </a>
                    </div>
                </div>
            </div>
            <div class="sep20"></div>
            <div class="profile-box">

            </div>
        </div>
        <div class="sep20-flex-width"></div>
        <div class="left-bar">
            <div class="box">
                <div class="header" style="text-align: left">
                    <div><a href="#">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;最近的话题</div>
                </div>
                <!-- 最近话题-->
                @foreach($pages as $page)
                <div class="recent-topic">
                    <a href="#">
                    <div class="cell">
                        <div class="cell-itme" style="justify-content: space-between;">
                            <strong>{{$page->title}}</strong>&nbsp;&nbsp;
                            <span>{{$page->created_at}}</span>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
                @if(count(Auth::user()->pages) > 10)
                    <div class="cell">
                        <div class="cell-itme" style="float: right">
                            <a href="#">
                                <span>查看所有话题</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="sep20"></div>
            <div class="box">
                <div class="header" style="text-align: left">
                    <div><a href="#">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;最近的回复</div>
                </div>
                <!-- 最近话题-->
                @foreach($comments as $comment)
                    <div class="recent-reply">
                        <div class="cell">
                            <div class="cell-itme-c">
                                <a href="#">
                                    <div>{{$comment->page->title}}</div>&nbsp;&nbsp;
                                </a>
                                <div class="reply-itme">{!! $comment->comment !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(count(Auth::user()->pages) > 10)
                    <div class="cell">
                        <div class="cell-itme" style="float: right">
                            <a href="#">
                                <span>查看所有回复</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection