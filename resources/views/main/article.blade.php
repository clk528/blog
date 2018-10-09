@extends('layouts.blog.blog')
@section('head')
    <link href="{{asset('css/markdown.css')}}" rel="stylesheet" type="text/css">
    <link href="//lib.baomitu.com/KaTeX/0.9.0/katex.min.css" rel="stylesheet">
    <script src="//lib.baomitu.com/KaTeX/0.9.0/katex.min.js"></script>
@endsection
@section('content')
    <main id="main">
        <article class="post">
            <header class="post-head"><h1 class="post-title">{{$title}}</h1>
                <time datetime="{{$humanDate}}" class="post-time">{{$humanDate}}  分类:{{$category['name']}}</time>
            </header>
            <div class="post-content">
            {!! $html !!}
            </div>
            <footer class="post-foot">
                <section class="tags">
                    @foreach($tags as $item)
                        <a class="tag" href="{{route('main.tags',['id' => $item['id']])}}">{{$item['name']}}</a>
                    @endforeach
                </section>
            </footer>
        </article>
    </main>
@endsection
@section('foot')
<script src="{{asset('assets/js/page/article.min.js')}}"></script>
@endsection