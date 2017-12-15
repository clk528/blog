<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','很牛逼的网站')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css">

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
        <main id="main" class="home">
            @if(!empty($data))
                @foreach($data as $value)
                <article class="post">
                    <header class="post-head"><h2 class="post-title">
                            <a href="{{route('article.detail',['id'=>$value['id']])}}">{{$value['title']}}</a>
                        </h2>
                        <time datetime="{{$value['humanDate']}}" class="post-time">{{$value['humanDate']}}</time>
                    </header>
                    <section class="post-excerpt">
                        <p>{{$value['subtitle']}}</p>
                    </section>
                </article>
                @endforeach
            @else
                <div style="margin-top: 100px;">
                    <i class="material-icons md-70">呜呜呜呜</i>
                    <p>现在还没有文章呢</p>
                </div>
            @endif
        </main>
        <aside id="siderbar">
            <section class="categories">
                <h3 class="aside-title"><i class="iconfont icon-folder-open-o"></i> Categories</h3>
                @foreach($categories as $id=>$value)
                    <a class="tag" href="/cate/{{$id}}" title="{{$value['name']}}">{{$value['name']}}</a>
                @endforeach
            </section>
            <section class="tags">
                <h3 class="aside-title"><i class="iconfont icon-tags"></i>Tags</h3>
                @foreach($tags as $id=>$value)
                    <a class="tag" href="/tag/{{$id}}" title="{{$value['name']}}">{{$value['name']}}</a>
                @endforeach
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
{{--<script src="http://blog.clk528.com/usr/themes/lpisme/js/instantclick.min.js" data-no-instant></script>
<script data-no-instant>
    InstantClick.on('change', function(isInitialLoad) {
        if (isInitialLoad === false) {
            if (typeof Prism !== 'undefined') Prism.highlightAll(true,null);
            if (typeof ga !== 'undefined') ga('send', 'pageview', location.pathname + location.search);
        }
    });
    InstantClick.init();
</script>--}}
</html>