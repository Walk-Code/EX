@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading">消息</div>
                    <div class="panel-body">
                        <p>
                            <span style="font-weight: 400">该ip无访问权限</span>
                        </p>
                        <p>请跟管理员联系</p>
                        <a href="{{url('/')}}">
                            <button type="button" class="btn btn-info">
                                返回
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
