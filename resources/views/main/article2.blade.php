<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name','很牛逼的网站')}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/markdown.css')}}?v={{time()}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}?v={{time()}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('assets/components/layer/layer.js')}}"></script>

    <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.css">
    <script src="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.js"></script>
</head>
<body>
<header id="header">
    <div id="header-warp">
        <h1 id="logo"><a href="/">clk528</a></h1>
        <nav id="nav" class="clear">
            <a href="/article/archives"><i class="iconfont icon-book"></i>Archives</a>
            <a href="https://github.com/clk528" target="_blank"><i class="iconfont icon-github"></i>Github</a>
            <a href="https://www.facebook.com/clk528" target="_blank"><i class="iconfont icon-facebook"></i>Facebook</a>
        </nav>
    </div>
</header>
<section id="content">
    <main id="main">
        <article class="post">
            <header class="post-head"><h1 class="post-title">{{$title}}</h1>
                <time datetime="{{$humanDate}}" class="post-time">{{$humanDate}}</time>
            </header>
            <div class="post-content">
            {!! $html !!}
            </div>
            <footer class="post-foot">
                <section class="tags">
                    <a class="tag" href="/tag/8">杂谈</a>
                </section>
            </footer>
        </article>
    </main>
</section>
<footer id="footer">
    <section class="foot-warp">
        <section class="copyright">&copy; {{date('Y')}} clk528<a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" style="margin-left: 20px;" target="_blank">湘ICP备14014225号</a></section>
    </section>
</footer>
</body>
<script src="{{asset('assets/js/page/article.js')}}"></script>
</html>