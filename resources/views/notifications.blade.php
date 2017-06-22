@extends("layouts.app")
@section("content")
<div class="main">
    <div class="left-bar">
        <div class="box">
        <div class="header" style="text-align: left">
            <span><a href="/">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;提醒</span>
            <div class="float-right">
                <span>共收到提醒数&nbsp;&nbsp;
                     <strong>{{count($userNotifications)}}</strong>
                </span>
            </div>
        </div>
        @foreach($userNotifications as $notification)
        <div class="cell">
                <div class="cell-itme">
                    <div style="width: 32px;text-align: left">
                        <a href="#">
                            <img src="//v2ex.assets.uxengine.net/avatar/d3a1/ff18/92937_mini.png?m=1422369016" border="0" align="default">
                        </a>
                    </div>
                    <div style="width: auto;text-align: center">
                        <span>
                            <a href="#">
                                <strong>{{$notification->user->name}}</strong>
                            </a>
                            &nbsp;
                            <a href="{{url('/t/'.$notification->post_id)}}">
                                {{$notification->post->title}}
                            </a>
                        </span>
                        &nbsp;
                        <span class="notification-time">
                            1天前
                        </span>
                        &nbsp;
                        <a href="#">
                           删除
                        </a>
                        <div class="sep5"></div>
                        <!--content -->
                        <div class="notification-payload">{!! empty($notification->comment) ? "无" : $notification->comment->comment !!}</div>
                    </div>
                </div>
        </div>
        @endforeach
        </div>
        <!--pageator -->
        <div>
            {{$userNotifications}}
        </div>
    </div>
    <div class="sep20-flex-width"></div>
    <!-- right-bar-->
    <div class="right-bar">
        注意事项版块
    </div>
</div>
@endsection