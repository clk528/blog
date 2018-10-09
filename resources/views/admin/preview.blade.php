<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        <script src="//lib.baomitu.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{asset('assets/components/layer/layer.js')}}"></script>
        <link href="//lib.baomitu.com/KaTeX/0.9.0/katex.min.css" rel="stylesheet">
        <script src="//lib.baomitu.com/KaTeX/0.9.0/katex.min.js"></script>
        <link href="{{asset('css/style.css')}}?v={{config('custom.static_version','1')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/markdown.css')}}?v={{time()}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="page_md_content" >
            {!! $html !!}
        </div>
    </body>
    <script src="{{asset('assets/js/page/article.js')}}"></script>
</html>