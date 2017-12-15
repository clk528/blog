$('table').addClass('table table-bordered table-striped-white');
$(".editormd-tex").each(function (k,v) {
    var text = $(v).find('.katex-mathml annotation').text();
    $(v).empty();
    katex.render(text, v);
});
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
//图片点击放大
$("img").click(function () {
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

$.each($('table'), function () {
    $(this).prop('outerHTML', '<div style="width: 100%;overflow-x: auto;">' + $(this).prop('outerHTML') + '</div>');
});

$("table thead tr").css({"background-color": "#08c", "color": "#fff"});
$("table tr").each(function () {
    if ($(this).find("td").eq(1).html() == "object" || $(this).find("td").eq(1).html() == "array[object]") {
        $(this).css({"background-color": "#99CC99", "color": "#000"});
    }

});