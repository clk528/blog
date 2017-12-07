<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name','很牛逼的网站')}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/home.css')}}?v={{time()}}" rel="stylesheet" type="text/css">
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
                    <header class="post-head"><h1 class="post-title">LaraDock 无法启动Mysql 解决方法</h1>
                        <time datetime="1 week ago" class="post-time">1 week ago</time>
                    </header>
                    <div class="post-content">
                        <iframe onload="setIframeHeight(this)" width="100%" scrolling="yes" height="100%" frameborder="0" style="overflow: visible;" name="main" seamless="seamless" src="{{route('preview',['id'=>$id])}}"></iframe>
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
                <section class="copyright">© {{date('Y')}} clk528<a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" style="margin-left: 20px;" target="_blank">湘ICP备14014225号</a></section>
            </section>
        </footer>
    </body>
    <script>
        function setIframeHeight(iframe) {
            if (iframe) {
                var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
                if (iframeWin.document.body) {
                    iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
                }
            }
        }
    </script>
</html>