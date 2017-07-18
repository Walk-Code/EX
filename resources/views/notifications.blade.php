@extends("layouts.app")
@section("content")
    <div class="main">
        <div class="left-bar">
            <div class="box">
                <div class="header" style="text-align: left">
                    <span><a href="/">EX</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span class="small-title">提醒</span></span>
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
                                    <img src="{{ $notification->user->head_img }}" border="0" align="default"
                                         class="notification-avatar">
                                </a>
                            </div>
                            <div class="sep20-w"></div>
                            <div style="width: auto;text-align: center">
                        <span>
                            &nbsp;
                            @if($notification->post)
                                <a href="{{url('/profile/'.$notification->user->name)}}">
                                    <strong>{{$notification->user->name}}</strong>
                                </a>&nbsp;在
                                <a href="{{url('/t/'.$notification->post_id.(empty($notification->comment_id) ? "" : '#'.$notification->comment_id))}}"
                                   class="font-600">
                                    {{ $notification->post->title }}
                                </a>
                                &nbsp;回复你
                            @else
                                <a href="{{url('/profile/'.$notification->attentionUser->name)}}">
                                    你关注了<span class="font-600">{{ $notification->attentionUser->name }}</span>
                                </a>
                            @endif
                            <span class="notification-time">
                                {{ $notification->friendTime }}
                            </span>
                            &nbsp;
                            <a href="#">
                               删除
                            </a>
                            <div class="sep5"></div>
                            <!--content -->
                            @if(!empty($notification->comment))
                                <div class="notification-payload">{!! $notification->comment->comment !!}</div>
                            @endif
                        </span>
                                &nbsp;
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

        </div>
    </div>
@endsection