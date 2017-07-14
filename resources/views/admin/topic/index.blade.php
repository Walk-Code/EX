@extends("admin.dashboard")
@section("content")
    <div class="ex-model">
        <!-- 创建话题数 -->
        <div class="small-box bg-green" style="width: 30%">
            <div class="ex-inner">
                <h3>{{ $currentDateTopic }}<sup style="font-size: 20px"></sup></h3>

                <p>创建话题数</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- 警告 -->
        <div class="small-box bg-red" style="width: 30%">
            <div class="ex-inner">
                <h3>53<sup style="font-size: 20px"></sup></h3>

                <p>报告数目</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="box-body bg-white">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="row" style="display: flex;">
                    <form class="cp-left" action="{{url('/admin/topic')}}" method="post"
                          style="padding: 0px 0px 10px 31px;width: 50%">
                        {{csrf_field()}}
                        <div class="dataTables_length" id="example1_length">
                            <input type="search" class="form-control" aria-controls="search" name="key"
                                   placeholder="搜索用户名/话题" @if(!empty($key)) value="{{$key}}" @endif>
                            <button type="submit" class="btn btn-default"><i class="fa  fa-search"></i></button>
                        </div>
                        <div class="dataTables_length" id="example1_length" style="display: flex;margin-top: 5px">
                            <input type="search" class="form-control datepicker" style="width: 500px;"
                                   aria-controls="search" name="timer" placeholder="搜索时间区间"
                                   @if(!empty($timer)) value="{{$timer}}" @endif>
                            <button type="submit" class="btn btn-default"><i class="fa  fa-search"></i></button>
                        </div>
                    </form>

                </div>
                <input type="hidden" id="date_rang" @if(!empty($timer)) value="{{$timer}}" @endif />
            </div>
        </div>

        <div class="">
            <table class="table table-bordered table-striped datatable no-margin" role="grid"
                   aria-describedby="example1_info" style="text-align: center">
                <thead>
                <tr role="row">
                    <td style="blottery-top-left-radius: 4px">标题</td>
                    <td>创建者</td>
                    <td>收藏数</td>
                    <td>举报数</td>
                    <td>创建时间</td>
                    <td>操作</td>
                </tr>
                </thead>
                @foreach($pages as $page)
                    <tbody>
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->user->name }}</td>
                        <td>{{ count($page->store) }}</td>
                        <td>0</td>
                        <td>{{ $page->created_at }}</td>
                        <td>
                            <div class="center">
                                <a class="btn btn-primary button_style"
                                   href="{{ url('/admin/page/w/'.rawurlencode($page->name)) }}">查看</a>
                                <a class="btn btn-primary button_style"
                                   href="{{ url('/admin/page/w/'.rawurlencode($page->name)) }}">隐藏</a>

                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            <!-- footer -->
            <div class="clearfix">
                <ul class="pagination pagination-sm no-margin pull-left" style="padding: 10px">
                    总{{ $pages->total() }}条记录
                </ul>
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $pages->appends(["key" => $key,"timer" => $timer])->render() }}
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("jscontent")
    <script src="{{asset('/AdminLTE-2.3.11/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('/AdminLTE-2.3.11/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $(".datepicker").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: '取消',
                format: 'YYYY-MM-DD'
            }
        });

        $('input[name="timer"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
        });

        $('input[name="timer"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        $('input[name="timer"]').val($("#date_rang").val());
    </script>
@endsection