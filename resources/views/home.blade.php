@extends('layouts.app')
@section('content')
    <style type="text/css" rel="stylesheet">
       a.count_ex:link, a.count_ex:active {
            color: white;
            background-color: #aab0c6;
            display: inline-block;
            padding: 2px 10px 2px 10px;
            -moz-border-radius: 12px;
            -webkit-border-radius: 12px;
            border-radius: 12px;
            text-decoration: none;
            margin-right: 5px;
            word-break: keep-all;
        }
    </style>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <div class="panel panel-default">
                <!-- tags -->
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body no_padding">
                    @foreach($pages as $page)
                    <div class="cell">
                        <table style="width:100%;">
                            <tbody>
                                <tr>
                                    <td width="48" valign="top" align="center">
                                        <a href="#">
                                            <img src="{{$page->image}}" class="avatar" border="0" align="default">
                                        </a>
                                    </td>
                                    <td width="10"></td>
                                    <td width="auto" valign="middle">
                                        <span class="item_title">
                                            <a href="{{url('t',$page->id)}}">{{$page->title}}</a>
                                        </span>
                                        <div class="sep5"></div>
                                        <span class="small">
                                            <div class="votes"></div>
                                            <a class="node" href="#">android</a>
                                            &nbsp;·&nbsp;
                                            <strong>
                                                <a href="#">{{$page->author}}</a>
                                            </strong>
                                            &nbsp;·&nbsp;刚刚&nbsp;·&nbsp;最后回复来之
                                            <strong>
                                                <a href="#">{{$page->author}}</a>
                                            </strong>
                                        </span>
                                    </td>
                                    <td width="120"></td>
                                    <td width="auto" align="right" valign="middle">
                                        <a href="#" class="count_ex" style="text-decoration: none;">63</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
                <!-- 分页-->
                {{$pages}}

            </div>
        </div>
        @include('layouts.right')

    </div>
</div>
@endsection
