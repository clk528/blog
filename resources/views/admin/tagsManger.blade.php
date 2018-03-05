@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <ul class="breadcrumb">
            <li><a href="#">后台管理</a></li>
            <li class="active">标签管理</li>
            <button class="pull-right btn btn-info" name="addCategories">添加标签</button>
        </ul>
        <input type="hidden" id="token" value="{{csrf_token()}}">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>编号</th>
                <th>名称</th>
                <th>创建人</th>
                <th>修改人</th>
                <th>创建日期</th>
                <th>修改日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="tbody">
            <tr>
                <td colspan="7">
                    <div style="text-align: center">
                        正在加载中.....
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/js/page/tags.js')}}"></script>
    <script src="{{asset('assets/components/pagination/pagination.min.js')}}"></script>
@endsection