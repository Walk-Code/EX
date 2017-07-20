<div class="main-sidebar">
    <!-- Inner sidebar -->
    <div class="sidebar">
        <!-- user panel (Optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/AdminLTE-2.3.11/dist/img/avatar04.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>User Name</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div><!-- /.user-panel -->

        <!-- Search Form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form><!-- /.sidebar-form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview @if(in_array("user",explode("/",session("left-bar")))) active @endif">
                <a href="#"><span>用户管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('/admin/user')}}">用户管理</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(in_array("topic",explode("/",session("left-bar")))) active @endif">
                <a href="{{url('/admin/business')}}"><span>话题管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('/admin/topic')}}">话题</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(in_array("system",explode("/",session("left-bar")))) active @endif">
                <a href="#"><span>系统管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/system/ip')}}">Ip列表</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/system/logs')}}">错误日志</a></li>
                </ul>
            </li>

            <li class="treeview @if(in_array("model",explode("/",session("left-bar")))) active @endif">
                <a href="#"><span>版块设置</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"></a></li>
                </ul>
            </li>

            {{--<li class="treeview @if(in_array("bargain",explode("/",session("left-bar")))) active @endif">
                <a href="#"><span>砍价活动</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/Admin/bargain')}}">砍价列表</a></li>
                    --}}{{--<li><a href="{{url('/Admin/activity/order')}}">订单列表</a></li>--}}{{--
                </ul>
            </li>--}}
        </ul><!-- /.sidebar-menu -->

    </div><!-- /.sidebar -->
</div><!-- /.main-sidebar -->
