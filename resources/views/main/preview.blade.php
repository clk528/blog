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

        <link href="//cdn.bootcss.com/highlight.js/9.12.0/styles/atom-one-dark.min.css" rel="stylesheet">


        {{--katex--}}
        <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.css">
        <script src="//cdn.bootcss.com/KaTeX/0.9.0-alpha2/katex.min.js"></script>

        <script src="//cdn.bootcss.com/raphael/2.2.7/raphael.min.js"></script>

        {{--flowchart--}}
        <script src="//cdn.bootcss.com/flowchart/1.7.0/flowchart.min.js"></script>

        {{--sequence--}}
        <script src="//cdn.bootcss.com/webfont/1.6.28/webfontloader.js"></script>
        <script src="//cdn.bootcss.com/snap.svg/0.5.1/snap.svg-min.js"></script>
        <script src="//cdn.bootcss.com/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="//cdn.bootcss.com/js-sequence-diagrams/1.0.6/sequence-diagram-min.js"></script>

        <link href="{{asset('assets/js/markdown/index.css')}}" rel="stylesheet">

    </head>
    <body>
        <div id="page_md_content" >
            {!! $html !!}
        </div>
    </body>
    <script>
        !(function ($) {
            hljs.initHighlightingOnLoad();

            /*判断是否是移动设备*/
            function isMobile(){
                return navigator.userAgent.match(/iPhone|iPad|iPod|Android|android|BlackBerry|IEMobile/i) ? true : false;
            }

            //为所有table标签添加bootstap支持的表格类
            $("table").addClass("table table-bordered table-hover");
            $.each($('table'), function () {
                $(this).prop('outerHTML', '<div style="width: 100%;overflow-x: auto;">' + $(this).prop('outerHTML') + '</div>');
            });

            //不是本项目的超链接都在新窗口打开
            $('a[href^="http"]').each(function () {
                $(this).attr('target', '_blank');
                $(this).click(function () {
                    var target_url = $(this).attr("href");
                    if (target_url.indexOf(window.top.location.host + window.top.location.pathname) > -1) {
                        window.top.location.href = target_url;
                        return false;
                    }
                });

            });

            if (!isMobile()) {
                $("th").css("min-width", "77px");
            }


            $("table thead tr").css({"background-color": "#08c", "color": "#fff"});
            $("table tr").each(function () {
                if ($(this).find("td").eq(1).html() == "object" || $(this).find("td").eq(1).html() == "array[object]") {
                    $(this).css({"background-color": "#99CC99", "color": "#000"});
                }

            });

            //图片点击放大
            $("#page_md_content img").click(function () {
                var img_url = $(this).attr("src");
                //如果不在iframe里，则直接当前窗口打开
                if (self == top) {
                    var json = {
                        "title": "", //相册标题
                        "id": 123, //相册id
                        "start": 0, //初始显示的图片序号，默认0
                        "data": [   //相册包含的图片，数组格式
                            {
                                "alt": "",
                                "pid": 666, //图片id
                                "src": img_url, //原图地址
                                "thumb": img_url //缩略图地址
                            }
                        ]
                    }
                    layer.photos({
                        photos: json
                        , anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
                    });

                } else {
                    //如果在iframe里，则直接传url给父窗口
                    var message = {"img_url": img_url, "meessage_type": "img_url"};
                    top.postMessage(message, window.location.origin);
                }
            });

            var sb = 1;

            $(".editormd-tex").each(function (k,v) {
                katex.render($(v).text(), v);
            });



            $(".sequence-diagram").each(function (k,v) {
                v.id = "sequenceDiagram" + sb;
                var diagram = Diagram.parse($(v).text());
                $(v).empty();
                diagram.drawSVG(v.id,{theme: 'simple'});
                sb +=1;
            });

            $(".flowchart").each(function (k,v) {
                v.id = "flowchart" + sb;
                var diagram = flowchart.parse($(v).text());
                $(v).empty();
                diagram.drawSVG(v.id);
                sb +=1;
            });

        })(jQuery);
    </script>
</html>