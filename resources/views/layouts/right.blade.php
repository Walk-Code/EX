<link href="{{ asset('/EX/font/mail/iconfont.css') }}" rel="stylesheet"/>
<div class="col-xs-6 col-sm-3 sidebar-offcanvas no_padding" id="rightBar">
    <div class="box">
    @if(Auth::user())
        <!-- 个人信息 -->
            <div class="cell">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <td width="48" valign="top">
                        <a href="#"><img src="{{ Auth::user()->head_img }}" class="avatar" border="0" align="default"
                                         style="max-width: 48px; max-height: 48px;"></a>
                    </td>
                    <td width="10" valign="top"></td>
                    <td width="auto" align="left">
                    <span class="bigger">
                        <a href="{{ url('profile/'.Auth::user()->name) }}">{{ Auth::user()->name }}</a>
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
                        <td width="34%" align="center"
                            style="border-left: 1px solid rgba(100, 100, 100, 0.4); border-right: 1px solid rgba(100, 100, 100, 0.4);">
                            <a href="#" class="dark" style="display: block">
                                <span class="bigger">{{ count(Auth::user()->storeTopic) }}</span>
                                <div class="sep3"></div>
                                <span class="">收藏主题</span>
                            </a>
                        </td>
                        <td width="33%" align="center">
                            <a href="#" class="dark" style="display: block">
                                <span class="bigger">{{ count(Auth::user()->storeUser) }}</span>
                                <div class="sep3"></div>
                                <span class="">特别关注</span>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- 活跃度 -->
        {{-- <div class="cell">
             <div style="width:272px;background-color: #f0f0f0; vertical-align: middle;height: 3px;display: inline-block">
                 <div style="background-color: #ccc;width: 36px;height: 3px;"></div>
             </div>
         </div>--}}
        <!--创建新主题 -->
            <div class="cell">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tbody>
                    <tr>
                        <td width="32">
                            <a href="#">
                                <img src="{{ asset('/EX/images/create.png') }}" width="16" border="0">
                            </a>
                        </td>
                        <td width="10"></td>
                        <td width="auto" valign="middle" align="left">
                            <a href="{{url('new')}}" style="font-weight: 400;">创建新主题</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- 未验证邮箱 -->
            <div class="cell">
                <table cellspacing="0" cellpadding="0" border="0" width="100%;">
                    <tbody>
                    <tr>
                        <td width="32">
                            <a href="#">
                                {{--<img src="#" width="32" border="0">--}}
                                <i class="iconfont icon-youjian"></i>
                            </a>
                        </td>
                        <td width="10"></td>
                        <td width="auto" valign="middle" align="left">
                            <a href="{{url('new')}}" id="mail" data-mail="{{ Auth::user()->email }}"
                               style="font-weight: 400;">未验证邮箱</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- 金币模块 -->
            <div class="inner">
                <a href="{{url('notification')}}" class="message">
                    @if(count(Auth::user()->hasManyNotification->where("is_read",0)) > 0)
                        <img src="{{ asset('EX/images/start.png') }}" class="star">
                    @endif
                    {{ count(Auth::user()->hasManyNotification->where("is_read",0)) }}&nbsp;条未读消息
                </a>
                {{--  <div style="float: right;display: flex;">
                      <a href="#" class="assets">
                          2&nbsp;<img src="https://ooo.0o0.ooo/2017/05/17/591bfa8220346.png" alt="G" align="absmiddle" border="0" style="padding-bottom: 2px;">
                          2&nbsp;<img src="https://ooo.0o0.ooo/2017/05/17/591bfa821e8fd.png" alt="S" align="absmiddle" border="0" style="padding-bottom: 2px;">
                          2&nbsp;<img src="https://ooo.0o0.ooo/2017/05/17/591bfa821f9f3.png" alt="B" align="absmiddle" border="0">
                      </a>
                  </div>--}}
            </div>
        @else
            <div class="register-title"></div>
            <div class="cell">
                <div class="ex-inner">
                    <a href="{{url('register')}}">
                        <button class="register-button">
                            现在注册
                        </button>
                    </a>
                    <div class="sep20"></div>
                    <span>已注册用户请&nbsp;&nbsp;
                        <a href="{{url('login')}}">登录</a>
                    </span>
                </div>
            </div>
        @endif
    </div>
    <div class="sep20"></div>

    <div class="box" style="border-radius: 0">
        <div class="cell"></div>
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

    /*if(){

     }
     */
    var mail = $("#mail");
    var url = mail.attr("data-mail").split('@')[1];

    for (key in hash) {
        if (key.toString() == url.trim()) {
            mail.attr("href", hash[key])
        }
    }

</script>

