@extends('layouts.blog.blog')
@section('head')
    <link href="{{asset('css/markdown.css')}}?v={{time()}}" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.css">
    <script src="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.js"></script>
@endsection
@section('content')
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
@endsection
@section('foot')
<script src="{{asset('assets/js/page/article.js')}}"></script>
@endsection