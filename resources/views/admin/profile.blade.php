@extends('layouts.admin')
@section('content')
    <div class="container" style="background-color:#F3F3F3">
        <div class="starter-template">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="img"></div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
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
                            <div class="col-lg-6 col-sm-6 col-xs-6"> 账号密码</div>
                        </div>
                        <div class="row" style="margin-top: .5rem">
                            <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="{{Auth::user()->email}}" disabled="true"></div>
                            <div class="col-lg-6 col-sm-6 col-xs-6"><input type="text" class="c-text" value="*******" disabled="true"></div>
                        </div>
                    </div>

                    <div class="card">
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
    <style>
        .starter-template {
            padding: 40px 15px;
        }
        .img {
            border-radius: 50%;
            border: 1px solid green;
            width: 10rem;
            height: 10rem;
            background-image:url(https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=3049895663,2594035805&fm=27&gp=0.jpg);
            background-repeat:no-repeat;
            background-size:100% 100%;
            -moz-background-size:100% 100%;
        }
        .card{
            background-color: white;
            padding: 2rem;
            border-radius: .3rem;
            margin-bottom: 3rem;
        }
        .c-text{
            margin: 0;
            padding: .65em 1em;
            font-size: 1em;
            background-color: #FFF;
            border: 1px solid rgba(0,0,0,.15);
            outline: 0;
            color: rgba(0,0,0,.7);
            border-radius: .3125em;
            -webkit-transition: background-color .3s ease-out,-webkit-box-shadow .2s ease,border-color .2s ease;
            -moz-transition: background-color .3s ease-out,box-shadow .2s ease,border-color .2s ease;
            transition: background-color .3s ease-out,box-shadow .2s ease,border-color .2s ease;
            -webkit-box-shadow: 0 0 rgba(0,0,0,.3) inset;
            box-shadow: 0 0 rgba(0,0,0,.3) inset;
            -webkit-appearance: none;
            -webkit-tap-highlight-color: rgba(255,255,255,0);
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            width: 90%;
        }
    </style>
@endsection
