@extends('layouts.blog.blog')
@section('content')
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
    @include('layouts.blog.sidebar')
@endsection
@section('foot')
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
<script>
    layer.photos({
        photos: {
            "title": "扫码得红包",
            "id": 123,
            "start": 0,
            "data": [
                {
                    "alt": "扫码得红包",
                    "pid": 666, //图片id
                    "src": "http://cdn.clk528.com/temp/alipay.png?x-oss-process=image/resize,w_350,limit_0",
                    "thumb": "http://cdn.clk528.com/temp/alipay.png?x-oss-process=image/resize,w_350,limit_0"
                }
            ]
        },
        anim: 5
    });
</script>
@endsection