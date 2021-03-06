<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="clk528,clk@clk528.com">
        <meta name="renderer" content="webkit">
        <meta name="applicable-device" content="pc,mobile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta name="generator" content="Laravel5.5,PHP7.1,MySQL,Nginx,Redis"/>
        <meta name="keywords" content="clk528,逗逼,PHP,JAVA,LUA,Python,Life,杂谈">
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1">
        <meta name="description" content="一个简单的技术博客,闲暇的时候乱写写,祖传PHP,搞过前端AngularJS,Vue,React略懂,学过Java,开发环境惯用Mac.">
        <title>{{config('custom.blogTitle','很牛逼的网站')}}</title>
        <script type="text/javascript" src="https://hm.baidu.com/hm.js?f99d6fae641c1fa0793b015a28a9e6ca"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/style.css')}}?v={{config('custom.static_version','1')}}" rel="stylesheet" type="text/css">
        <script src="//lib.baomitu.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{asset('assets/components/layer/layer.js')}}"></script>
        @yield('head')
    </head>
    <body>
        @include('layouts.blog.header')

        <section id="content">
            @yield('content')

            @yield('sidebar')
        </section>

        @include('layouts.blog.footer')

    </body>
    @yield('foot')
</html>
