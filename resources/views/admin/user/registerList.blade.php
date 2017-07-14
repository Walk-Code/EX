@extends("admin.dashboard")
@section("content")

    <div class="box-body bg-white">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="row" style="display: flex;">
                    <form class="cp-left" action="{{url('/admin/user')}}" method="post"
                          style="padding: 0px 0px 10px 31px;width: 50%">
                        {{csrf_field()}}
                        <div class="dataTables_length" id="example1_length">
                            <input type="search" class="form-control" aria-controls="search" name="key"
                                   placeholder="搜索用户名" @if(!empty($key)) value="{{$key}}" @endif>
                            <button type="submit" class="btn btn-default"><i class="fa  fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="">
            <table class="table table-bordered table-striped datatable no-margin" role="grid"
                   aria-describedby="example1_info" style="text-align: center">
                <thead>
                <tr role="row">
                    <td width="120" style="blottery-top-left-radius: 4px">用户名</td>
                    <td>头像</td>
                    <td>邮箱</td>
                    <td>详情</td>
                </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td><img src="{{ $user->head_img }}" class="user-image"></td>
                        <td>{{ $user->email }}</td>
                        <td>###</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            <!-- footer -->
            <div class="clearfix">
                <ul class="pagination pagination-sm no-margin pull-left" style="padding: 10px">
                    总{{ $users->total() }}条记录
                </ul>
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $users }}
                </ul>
            </div>
        </div>
    </div>


@endsection