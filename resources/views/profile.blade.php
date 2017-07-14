@extends('layouts.app')
@section('content')
    <link href="{{asset("/EX/font/home/iconfont.css")}}" rel="stylesheet" type="text/css"/>
    <div class="main">
        <div class="right-bar">
            <div class="profile-box">
                <div class="profile-head">
                    <div style="width: 80px;text-align: left">
                        <a href="{{ $user->head_img }}">
                            <img src="{{ $user->head_img }}" class="avatar-radius" width="80px">
                        </a>
                    </div>
                    <div class="sep15-w"></div>
                    <div class="profile-head-content">
                        <div class="profile-head-item-w">
                            <div class="username">
                                <span>
                                    <strong>{{ $user->name }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="sep5"></div>

                        <div class="profile-head-item-h" style="align-items: flex-start">
                            <span class="profile-tag">主页</span>
                            <div class="sep5-w"></div>
                            <div class="profile-ex">
                                @if($user->website)
                                    @foreach(explode(",",$user->website) as $item)
                                        <a href=" {{ $item }}">
                                            {{ $item }}
                                        </a>
                                    @endforeach
                                @else
                                    <a href="#" onclick="addWebSide();">
                                        添加
                                    </a>
                                @endif
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
                            {{ count($user->storeTopic) }}
                        </span>
                            <div class="sep5"></div>

                            收藏主题
                        </a>
                    </div>

                    <div class="profile-counter">
                        <a href="#">
                        <span>
                            {{ count($user->storeUser) }}
                        </span>
                            <div class="sep5"></div>

                            特别关注
                        </a>
                    </div>
                </div>
                <div class="sep20"></div>
                @if(!(Auth::user()->id == $user->id))
                    <div class="profile-footer">
                        <div style="width: 50%">
                            @if($user->isAttention(Auth::user()->id,$user->id))
                                <a href="{{ url('/unattention/'.$user->name) }}" type="button" class="btn btn-info">
                                    已关注
                                </a>
                            @else
                                <a href="{{ url('/attention/'.$user->name) }}" type="button" class="btn btn-info">
                                    关注
                                </a>
                            @endif
                        </div>
                        <div style="width: 50%">
                            @if($user->isBlock(Auth::user()->id,$user->id))
                                <a href="{{ url('/unblock/'.$user->name) }}" type="button" class="btn btn-danger">
                                    已block
                                </a>
                            @else
                                <a href="{{ url('/block/'.$user->name) }}" type="button" class="btn btn-danger">
                                    block
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            <div class="sep20"></div>
            <div class="profile-box m-profile-box">

            </div>
        </div>
        <div class="sep20-flex-width"></div>
        <div class="left-bar">
            <div class="box">
                <div class="header" style="text-align: left">
                    <div><a href="#">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span class="small-title">最近的話題</span></div>
                </div>
                <!-- 最近话题-->
                @foreach($pages as $page)
                    <div class="recent-topic">
                        <a href="#">
                            <div class="cell">
                                <div class="cell-itme" style="justify-content: space-between;">
                                    <strong style="text-align: left">{{$page->title}}</strong>&nbsp;&nbsp;
                                    <span>{{$page->firendTime}}</span>
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
                    <div><a href="#">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span class="small-title">最近的回复</span></div>
                </div>
                <!-- 最近话题-->
                @foreach($comments as $comment)
                    <div class="recent-reply">
                        <div class="cell">
                            <div class="cell-itme-c">
                                <a href="#">
                                    <div class="font-600">{{$comment->page->title}}</div>&nbsp;&nbsp;
                                    <span class="time">{{ $comment->firendTime }}</span>
                                </a>
                                <div class="reply-itme font-600">{!! $comment->comment !!}</div>
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

        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">添加域名</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url("/profile/website") }}" method="post" id="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="name" value="{{ $user->name }}"/>
                            <div class="form-group">
                                <div style="display: flex">
                                    <input type="text" name="website" class="form-control" placeholder="多个网址地址用,隔开">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" onclick="$('#form').submit()">保存</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
    <script>
        function addWebSide() {
            $(".modal").modal();
        }


    </script>
@endsection