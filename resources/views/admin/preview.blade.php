<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>

        <script type="text/javascript" src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

        {{--bootstrap--}}
        <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        {{--layer--}}
        <script src="{{asset('assets/components/layer/layer.js')}}"></script>

        {{--highlight--}}
        <script src="//cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
        {{--<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/dark.min.css" rel="stylesheet">--}}
        {{--<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/github.min.css" rel="stylesheet">--}}
        {{--<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/default.min.css" rel="stylesheet">--}}
        {{--<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/monokai.min.css" rel="stylesheet">--}}
        <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/atom-one-dark.min.css" rel="stylesheet">
        {{--<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/hybrid.min.css" rel="stylesheet">--}}
        {{--<link href="//cdn.bootcss.com/highlight.js/9.12.0/styles/rainbow.min.css" rel="stylesheet">--}}

        {{--showdoc--}}
        <script src="{{asset('assets/js/markdown/showdoc.js')}}"></script>
        <link href="{{asset('assets/js/markdown/showdoc.css')}}" rel="stylesheet">

        {{--katex--}}
        <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.css">
        <script src="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.js"></script>

        <script src="{{asset('assets/components/editorMd/lib/marked.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/lib/prettify.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/lib/flowchart.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/lib/raphael.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/lib/underscore.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/lib/sequence-diagram.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/lib/jquery.flowchart.min.js')}}"></script>
        <script src="{{asset('assets/components/editorMd/editormd.min.js')}}?v=456"></script>

        <link href="{{asset('assets/js/markdown/index.css')}}" rel="stylesheet">
        <script src="{{asset('assets/js/markdown/index.js')}}"></script>
    </head>
    <body>
<div id="page_md_content" ><textarea style="display:none;">
{!! $content !!}
</textarea></div>
    </body>
</html>