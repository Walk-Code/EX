@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(isset($user))
                        <div class="panel-heading">邮箱验证</div>
                        <div class="panel-body">
                            <p>邮件已发送到您的邮箱
                                <span style="font-size: 1em">
                                <a href="#" style="color: #00a0e9" class="mail" id="mail">
                                    {{ $user->email  }}
                                </a>
                                </span>
                            </p>
                            <p>请点击邮箱中的验证链接完成验证</p>
                        </div>
                    @else
                        <div class="panel-heading">错误信息</div>
                        <div class="panel-body">
                            <p>
                                <span style="font-weight: 400">无访问权限</span>
                            </p>
                            <p>请按正确的步骤访问</p>
                            <a href="{{url('/')}}">
                                <button type="button" class="btn btn-info">
                                    返回
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>

        var hash = {
            'qq.com': 'http://mail.qq.com',
            'gmail.com': 'http://mail.google.com',
            'sina.com': 'http://mail.sina.com.cn',
            '163.com': 'http://mail.163.com',
            '126.com': 'http://mail.126.com',
            'yeah.net': 'http://www.yeah.net/',
            'sohu.com': 'http://mail.sohu.com/',
            'tom.com': 'http://mail.tom.com/',
            'sogou.com': 'http://mail.sogou.com/',
            '139.com': 'http://mail.10086.cn/',
            'hotmail.com': 'http://www.hotmail.com',
            'live.com': 'http://login.live.com/',
            'live.cn': 'http://login.live.cn/',
            'live.com.cn': 'http://login.live.com.cn',
            '189.com': 'http://webmail16.189.cn/webmail/',
            'yahoo.com.cn': 'http://mail.cn.yahoo.com/',
            'yahoo.cn': 'http://mail.cn.yahoo.com/',
            'eyou.com': 'http://www.eyou.com/',
            '21cn.com': 'http://mail.21cn.com/',
            '188.com': 'http://www.188.com/',
            'foxmail.com': 'http://www.foxmail.com'
        };


        $("#mail").each(function () {

            var url = $(this).text().split('@')[1];
            //$(this).prop("href",);
            for (key in hash) {
                if (key.toString() == url.trim()) {
                    $(this).attr("href", hash[key])
                }
            }

        });
    </script>
@endsection
