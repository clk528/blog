@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="text-center">
            <h1>添加成功！</h1>

            <a href="{{route('addArticle')}}">继续添加文章</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('blog')}}">返回文章管理</a>

        </div>
    </div>
@endsection