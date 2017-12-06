<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','很牛逼的网站')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/home.min.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
    <header id="header">
        <div id="header-warp">
            <h1 id="logo"><a href="/">clk528</a></h1>
            <nav id="nav" class="clear">
                <a href="/article/archives"><i class="iconfont icon-book"></i>Archives</a>
                <a href="https://github.com/clk528" target="_blank"><i class="iconfont icon-github"></i>Github</a>
                {{--<a href="https://twitter.com/csi0n"><i class="iconfont icon-facebook"></i>Facebook</a>--}}
            </nav>
        </div>
    </header>
    <section id="content">
        <main id="main" class="home">
            <article class="post">
                <header class="post-head"><h2 class="post-title">
                        <a href="{{route('article.detail',['id'=>5])}}">LaraDock 无法启动Mysql 解决方法</a>
                    </h2>
                    <time datetime="1 week ago" class="post-time">1 week ago</time>
                </header>
                <section class="post-excerpt">
                    <p>LaraDocker使用过程中遇到的问题记录</p>
                </section>
            </article>

            @for($i = 1;$i<=15;$i++)
                <article class="post">
                    <header class="post-head"><h2 class="post-title">
                            <a href="{{route('article.detail',['id'=>$i])}}">测试文章-大标题{{$i}}</a>
                        </h2>
                        <time datetime="1 week ago" class="post-time">{{$i}} week ago</time>
                    </header>
                    <section class="post-excerpt">
                        <p>小标题-文章id{{$i}}</p>
                    </section>
                </article>
            @endfor
        </main>
        <aside id="siderbar">
            <section class="categories">
                <h3 class="aside-title"><i class="iconfont icon-folder-open-o"></i> Categories</h3>
                <a class="tag" href="/cate/2" title="Android">Android</a>
                <a class="tag" href="/cate/3" title="IOS">IOS</a>
                <a class="tag" href="/cate/4" title="C#">C#</a>
                <a class="tag" href="/cate/5" title="Python">Python</a>
                <a class="tag" href="/cate/6" title="Life">Life</a>
                <a class="tag" href="/cate/7" title="PHP">PHP</a>
                <a class="tag" href="/cate/8" title="大数据">大数据</a>
                <a class="tag" href="/cate/9" title="杂谈">杂谈</a>
                <a class="tag" href="/cate/10" title="前端">前端</a>
                <a class="tag" href="/cate/11" title="Mac">Mac</a>
                <a class="tag" href="/cate/12" title="其他">其他</a>
                <a class="tag" href="/cate/13" title="WordPress">WordPress</a>
                <a class="tag" href="/cate/14" title="服务器">服务器</a>
                <a class="tag" href="/cate/15" title="笔记">笔记</a>
            </section>
            <section class="tags">
                <h3 class="aside-title"><i class="iconfont icon-tags"></i>Tags</h3>
                <a class="tag" href="/tag/1" title="PHP">PHP</a>
                <a class="tag" href="/tag/2" title="Android">Android</a>
                <a class="tag" href="/tag/3" title="Python">Python</a>
                <a class="tag" href="/tag/4" title="C#">C#</a>
                <a class="tag" href="/tag/5" title="大数据">大数据</a>
                <a class="tag" href="/tag/6" title="Spark">Spark</a>
                <a class="tag" href="/tag/7" title="IOS">IOS</a>
                <a class="tag" href="/tag/8" title="杂谈">杂谈</a>
                <a class="tag" href="/tag/9" title="Git">Git</a>
                <a class="tag" href="/tag/10" title="GO">GO</a>
                <a class="tag" href="/tag/11" title="树莓派">树莓派</a>
                <a class="tag" href="/tag/12" title="HomeKit">HomeKit</a>
                <a class="tag" href="/tag/13" title="智能家居">智能家居</a>
                <a class="tag" href="/tag/14" title="Cydia">Cydia</a>
                <a class="tag" href="/tag/15" title="越狱">越狱</a>
                <a class="tag" href="/tag/16" title="前端">前端</a>
                <a class="tag" href="/tag/17" title="JS">JS</a>
                <a class="tag" href="/tag/18" title="Mac">Mac</a>
                <a class="tag" href="/tag/19" title="黑苹果">黑苹果</a>
                <a class="tag" href="/tag/20" title="WordPress">WordPress</a>
                <a class="tag" href="/tag/21" title="Hyper-V">Hyper-V</a>
            </section>
            {{--<section class="friends">
                <h3 class="aside-title"><i class="iconfont icon-group"></i> Friends</h3>
            </section>--}}
        </aside>
    </section>
    <footer id="footer">
        <section class="foot-warp">
            <section class="copyright">© {{date('Y')}} clk528<a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" style="margin-left: 20px;" target="_blank">湘ICP备14014225号</a></section>
        </section>
    </footer>
</body>
</html>