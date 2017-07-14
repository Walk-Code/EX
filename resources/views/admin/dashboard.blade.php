<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<title>{{ $page_title or "AdminLTE Dashboard" }}</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<head>
    <link rel="icon" href="{{asset("/css/app-icon.png")}}">
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    {{--<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />--}}
    <link href="{{ asset("/AdminLTE-2.3.11/dist/css/ionicons.min.css")}}" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset("/AdminLTE-2.3.11/dist/css/AdminLTE.css")}}" rel="stylesheet" type="text/css"/>
    <!-- animate.css-->
    <link href="{{ asset("/EX/plugins/animate/animate.css") }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('/AdminLTE-2.3.11/plugins/nprogress/nprogress.css')}}"/>
    <script src="{{ asset('/AdminLTE-2.3.11/plugins/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

    <link href="{{asset('/AdminLTE-2.3.11/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet"
          type="text/css"/>

    <script src="{{ asset('/AdminLTE-2.3.11/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/AdminLTE-2.3.11/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <link href="{{ asset("/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/EX/admin.css") }}" rel="stylesheet" type="text/css"/>
    <!-- [endif]-->
</head>
<body class="hold-transition skin-yellow">
<div class="wrapper">

    <!-- Header -->
@include('layouts.admin.header')

<!-- Sidebar -->
    @include('layouts.admin.sidebar')
    <style type="text/css" rel="stylesheet">
        [data-notify="container"] {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 10%;
            height: 10px;
            text-align: center;
        }

        [data-notify="message"] {
            margin-top: -8px;
            display: flex;
            width: 100%;
            flex-direction: column;

        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div style="padding: 20px 30px; background-color: cornflowerblue; z-index: 999999; font-size: 16px; font-weight: 600;">
            <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title=""
               style="color: rgb(255, 255, 255); font-size: 20px;" data-original-title="Never show me this again!">×</a>
            <a href="https://themequarry.com"
               style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
                测试
            </a>
            <a class="btn btn-default btn-sm" href="https://themequarry.com"
               style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">Let's
                Do It!</a></div>

        @if(session('success'))
            <script>
                var notify = $.notify('{{session('success')}}',
                    //options
                    {
                        allow_dismiss: false,
                        type: 'success',
                        delay: 1000,
                        timer: 1000
                    }
                );
            </script>
        @elseif(session('fail'))
            <script>
                var notify = $.notify('{{session('fail')}}',
                    //options
                    {
                        allow_dismiss: false,
                        type: 'danger',
                        delay: 1000,
                        timer: 1000
                    }
                );
            </script>
        @endif

        @if(!empty($key) || !empty($timer))
            @if(isset($count))
                <script>
                    var notify = $.notify('{{$count}}',
                        //options
                        {
                            allow_dismiss: false,
                            type: 'info',
                            delay: 1000,
                            timer: 1000
                        }
                    );
                </script>
            @endif
        @endif

    <!-- Main content -->
        @if(isset($header))
            <div class="content-header">
                <h1>
                    {{$header['bigHeadMsg']}}
                    <small>Version 2.3</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">{{$header['smallHeadMsg']}}</li>
                </ol>
            </div>
        @endif
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.admin.footer')
    @yield('jscontent')
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="#">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="#">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>

    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<script src="{{asset('/AdminLTE-2.3.11/plugins/pjax/jquery.pjax.js')}}"></script>
<script>
    /* $(document).ready(function() {
     $(document).pjax('a', 'body');

     $(document).on('pjax:start', function() {
     NProgress.start();
     });

     $(document).on('pjax:end', function() {
     NProgress.done();
     self.siteBootUp();
     });

     $("body").on('click','#remove',function () {
     $(this).parent().css("display","none");
     });

     });
     */
    //sidebar-collapse
    /* function orby() {
     console.log(123);
     $("body").addClass("sidebar-collapse");
     }
     */
</script>
</body>
</html>
