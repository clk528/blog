@extends('layouts.admin')
@section('content')
    <div class="container" style="background-color:#F3F3F3;width: 70%">
        <div class="starter-template" >
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    {{--<div class="img"></div>--}}
                    <img src="{{asset('assets/images/header.jpg')}}" class="img-circle" style="width: 10rem;border: 1px solid green;">
                    <div style="margin-top: 2rem">
                        <p>注册日期：{{Auth::user()->created}}</p>
                        <p>最近登录：{{date('Y-m-d H:i:s',Auth::user()->login_time)}}</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">个人信息</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">用户名</div>
                                <div class="col-lg-6 col-sm-6 col-xs-6"> 昵称</div>
                            </div>
                            <div class="row" style="margin-top: .5rem">
                                <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="{{Auth::user()->user}}" disabled="true"></div>
                                <div class="col-lg-6 col-sm-6 col-xs-6"> <input type="text" class="c-text" value="{{Auth::user()->alias}}" disabled="true"></div>
                            </div>

                            <div class="row" style="margin-top: 1rem">
                                <div class="col-lg-6 col-sm-6 col-xs-6">邮箱</div>
                                <div class="col-lg-6 col-sm-6 col-xs-6"> 账号密码 <a href="javascript:void(0);" id="changePassword">修改密码</a></div>
                            </div>
                            <div class="row" style="margin-top: .5rem">
                                <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="{{Auth::user()->email}}" disabled="true"></div>
                                <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="*******" disabled="true"></div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">第三方信息</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">github</div>
                                <div class="col-lg-6 col-sm-6 col-xs-6">weibo</div>
                            </div>
                            <div class="row" style="margin-top: .5rem">
                                <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="{{Auth::user()->github}}" disabled="true"></div>
                                <div class="col-lg-6 col-sm-6 col-xs-6"> <input type="text" class="c-text" value="{{Auth::user()->weibo}}" disabled="true"></div>
                            </div>

                            <div class="row" style="margin-top: 1rem">
                                <div class="col-lg-6 col-sm-6 col-xs-6">facebook</div>

                            </div>
                            <div class="row" style="margin-top: .5rem">
                                <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="{{Auth::user()->facebook}}" disabled="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        ;(function ($) {
            $('#changePassword').click(function (e) {
                layer.confirm('<p>输入密码：<input type="text" nam="password"></p><p>确认密码：<input type="text"></p>', {
                    btn: ['重要','奇葩'] //按钮
                }, function(){
                    layer.msg('的确很重要', {icon: 1});
                });
            });
        })(jQuery);
    </script>
@endsection