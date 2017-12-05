<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('assets/components/editorMd/css/editormd.preview.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/components/editorMd/css/editormd.min.css')}}">



        <link href="https://cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.css" rel="stylesheet">
        <script src="https://cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.js"></script>

        <script src="https://cdn.bootcss.com/flowchart/1.7.0/flowchart.min.js"></script>


        <title>{{$title}}</title>


    </head>
    <body>
        {!! $content !!}
    </body>
    <script>
        $(".editormd-tex").each(function (k,v) {
            katex.render(v.innerText, v);
        });
        $(".flowchart").each(function (k,v) {
            var diagram = flowchart.parse(v.innerText);
            diagram.drawSVG(v);
        });
    </script>
</html>