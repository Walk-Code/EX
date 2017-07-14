@extends("admin.dashboard")
@section("content")
    <div class="">
        <!-- 禁用ip数 -->
        <div class="small-box bg-red" style="width: 30%">
            <div class="ex-inner">
                <h3>53<sup style="font-size: 20px"></sup></h3>

                <p>当天访问数</p>
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
                                   placeholder="搜索用ip" @if(!empty($key)) value="{{$key}}" @endif>
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
            <a class="btn btn-primary button_style" href="#" onclick="create()">添加</a>
            <table class="table table-bordered table-striped datatable" role="grid" aria-describedby="example1_info"
                   style="text-align: center;margin-top: 10px;">
                <thead>
                <tr role="row">
                    <td style="blottery-top-left-radius: 4px">禁用IP</td>
                    <td>用户</td>
                    <td>创建时间</td>
                    <td style="blottery-top-right-radius: 4px">操作</td>
                </tr>
                </thead>
                @foreach($blockLists as $item)
                    <tbody>
                    <tr>
                        <td>{{ $item->ip_address }}</td>
                        <td>
                            @if($item->user_id)
                                {{ $item->user->name }}
                            @else
                                无
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="center">
                                <a class="btn btn-danger button_style" href="{{ url('/admin/ip/delete/'.$item->id) }}">删除</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            <!-- footer -->
            <div class="clearfix">
                <ul class="pagination pagination-sm no-margin pull-left" style="padding: 10px">
                    总{{ $blockLists->total() }}条记录
                </ul>
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $blockLists->appends(["key" => $key,"timer" => $timer])->render() }}
                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">添加Block Ip</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url("/admin/ip/create") }}" method="post" id="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div style="display: flex">
                                <span class="column-center"><strong>ip</strong></span>&nbsp;&nbsp;
                                <input type="text" name="ip_address" class="form-control" placeholder="多个ip地址用,隔开">
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

        function create() {
            $(".modal").modal();
        }
    </script>
@endsection