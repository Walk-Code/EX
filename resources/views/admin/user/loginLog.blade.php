@extends("admin.dashboard")
@section("content")

    <div class="box-body bg-white">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="row" style="display: flex;">
                    <form class="cp-left" action="{{url('/admin/user/w/'.$name)}}" method="post"
                          style="padding: 0px 0px 10px 31px;width: 50%">
                        {{csrf_field()}}
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
                    <td>浏览器</td>
                    <td>设备</td>
                    <td>设备类型</td>
                    <td>ip</td>
                    <td>地址</td>
                    <td>语言</td>
                    <td>登录时间</td>
                    {{-- <td>操作</td>--}}
                </tr>
                </thead>
                @foreach($loginLogs as $loginLog)
                    <tbody>
                    <tr>
                        <td>{{ $loginLog->browser }}</td>
                        <td>{{ $loginLog->device }}</td>
                        <td>{{ $loginLog->device_type }}</td>
                        <td>{{ $loginLog->ip }}</td>
                        <td>{{ $loginLog->address }}</td>
                        <td>{{ $loginLog->language }}</td>
                        <td>{{ date("Y-m-d H:i:s P",$loginLog->login_time) }}</td>
                        {{-- <td>
                             <div class="center">
                                 <a class="btn btn-danger">注销</a>
                             </div>
                         </td>--}}
                    </tr>
                    </tbody>
                @endforeach
            </table>
            <!-- footer -->
            <div class="clearfix">
                <ul class="pagination pagination-sm no-margin pull-left" style="padding: 10px">
                    总{{ $loginLogs->total() }}条记录
                </ul>
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $loginLogs }}
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