@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <input type="hidden" id="token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#onsale" data-toggle="tab">已发表</a></li>
                    <li role="presentation"><a href="#unshelf" data-toggle="tab">已下架</a></li>
                    <li role="presentation"><a href="#unpublish" data-toggle="tab">待发表</a></li>
                </ul>
                <div class="tab-content" style="margin-top: 2rem;">
                    <div id="onsale" class="tab-pane fade in active">

                        <div style="border-bottom:1px solid #e6e6e6; margin: 2rem 0 2rem 0;padding: .5rem">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <form class="form-inline" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" placeholder="标题">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="搜索">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <a href="{{route('addArticle')}}" class="btn btn-warning pull-right">添加文章</a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>文章ID</th>
                                    <th>标题</th>
                                    <th>标签</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div ng-node="pagination"></div>
                    </div>
                    <div id="unshelf" class="tab-pane fade">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>文章ID</th>
                                <th>标题</th>
                                <th>标签</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div ng-node="pagination"></div>
                    </div>
                    <div id="unpublish" class="tab-pane fade">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>文章ID</th>
                                <th>标题</th>
                                <th>标签</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div ng-node="pagination"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                <div class="panel panel-default">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        .......
                    </div>
                    <div class="text-center">
                        <a href="javascript:void(0);"><i class="fa fa-plus"></i>展开更多</a>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        .......
                    </div>
                    <div class="text-center">
                        <a href="javascript:void(0);"><i class="fa fa-plus"></i>展开更多</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        .......
                    </div>
                    <div class="text-center">
                        <a href="javascript:void(0);"><i class="fa fa-plus"></i>展开更多</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        我是右边。
                        .......
                    </div>
                    <div class="text-center">
                        <a href="javascript:void(0);"><i class="fa fa-plus"></i>展开更多</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('assets/js/page/blog.js')}}"></script>
<script src="{{asset('assets/components/pagination/pagination.js')}}"></script>
@endsection