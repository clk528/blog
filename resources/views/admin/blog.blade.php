@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#onsale" data-toggle="tab">已发表</a></li>
                    <li role="presentation"><a href="#onsale2" data-toggle="tab">已下架</a></li>
                    <li role="presentation"><a href="#onsale3" data-toggle="tab">待发表</a></li>
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
                            <tbody>
                                @for ($i = 1; $i <= 15; $i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>陈龙科好帅</td>
                                        <td>好土豪</td>
                                        <td>已发表</td>
                                        <td>{{date('Y-m-d H:i:s')}}</td>
                                        <td>{{date('Y-m-d H:i:s')}}</td>
                                        <td>
                                            <button class="btn btn-success btn-xs"><span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span>查看</button>
                                            <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>下架</button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="onsale2" class="tab-pane fade">
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
                            <tbody>
                            @for ($i = 1; $i <= 20; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>陈龙科好帅</td>
                                    <td>好土豪</td>
                                    <td>已下架</td>
                                    <td>{{date('Y-m-d H:i:s')}}</td>
                                    <td>{{date('Y-m-d H:i:s')}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>删除</button>
                                        <button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>编辑</button>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="onsale3" class="tab-pane fade">
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
                            <tbody>
                            @for ($i = 1; $i <= 20; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>陈龙科好帅</td>
                                    <td>好土豪</td>
                                    <td>待发表</td>
                                    <td>{{date('Y-m-d H:i:s')}}</td>
                                    <td>{{date('Y-m-d H:i:s')}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>删除</button>
                                        <button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>编辑</button>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
        {{--<div class="row">
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Side</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">News</div>
                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            </div>
                            <div class="text-center">
                                <a href="blog.blade.php#"><i class="fa fa-plus"></i>Full Story</a>
                            </div>
                        </div>
                        <hr />
                        <div class="panel panel-default">
                            <div class="panel-heading">News</div>
                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            </div>
                            <div class="text-center">
                                <a href="blog.blade.php#"><i class="fa fa-plus"></i>Full Story</a>
                            </div>
                        </div>
                        <hr />
                        <div class="panel panel-default">
                            <div class="panel-heading">News</div>
                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            </div>
                            <div class="text-center">
                                <a href="blog.blade.php#"><i class="fa fa-plus"></i>Full Story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Article Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.
                        </p>
                        <div class="text-center">
                            <a href="blog.blade.php#"><i class="fa fa-plus"></i>Full Story</a>
                            <a href="blog.blade.php#"><i class="fa fa-comment"></i>12 Comments</a>
                            <a href="blog.blade.php#"><i class="fa fa-share"></i>11 Shares</a>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Article Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.
                        </p>
                        <div class="text-center">
                            <a href="blog.blade.php#"><i class="fa fa-plus"></i>Full Story</a>
                            <a href="blog.blade.php#"><i class="fa fa-comment"></i>2 Comments</a>
                            <a href="blog.blade.php#"><i class="fa fa-share"></i>211 Shares</a>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Article Title</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                            Aliquam in felis sit amet augue.
                        </p>
                        <div class="text-center">
                            <a href="blog.blade.php#"><i class="fa fa-plus"></i>Full Story</a>
                            <a href="blog.blade.php#"><i class="fa fa-comment"></i>7 Comments</a>
                            <a href="blog.blade.php#"><i class="fa fa-share"></i>67 Shares</a>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>--}}
    </div>
@endsection