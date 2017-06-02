@extends('layouts.app')
@section('content')

<div class="main">
    <!-- left-bar-->
    <div class="left-bar">
        <div class="box-flex-tipic">
            <span style="float: left">EX&nbsp;>&nbsp;创建新话题</span>
        </div>
        <div class="box-flex-tipic">
            <input class="title" value="输入标题。。。"/>
        </div>
        <div class="box-flex-tipic"></div>
        <div class="sep20-flex-height"></div>
        <div class="topic-content">
            <div class="box-flex-tipic">
                <span>评论内容</span>
            </div>
            <textarea style="height: 450px;width: 100%">

            </textarea>
        </div>
    </div>

    <div class="sep20-flex-width"></div>
    <!-- right-bar-->
    <div class="right-bar">
        450
    </div>

</div>

@endsection