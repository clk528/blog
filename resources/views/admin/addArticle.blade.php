@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="{{asset('assets/components/editorMd/css/editormd.min.css')}}" />
    <script src="{{asset('assets/components/editorMd/editormd.min.js')}}"></script>
@endsection

@section('content')
    <div id="page-wrapper">
        <h2>添加文章 </h2><br>
        <form class="form-inline" name="addArticle" method="post" action="{{route('saveArticle')}}">
            <div class="form-group">
                <label for="title">标题：</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="文章标题"><span style="color: red"> *</span>
                <input type="hidden" name="markdown">
                {{csrf_field()}}
            </div>
        </form>
        <hr>
        <div id="test-editormd"></div>
        <div class="text-center" ng-node="operate">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> 保存</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> 取消</button>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    var testEditor;
    $(function() {
        testEditor = editormd("test-editormd", {
            width: "90%",
            height: 700,
            path : '{{asset('assets/components/editorMd/lib')}}/',
            theme : "default",
            previewTheme : "default",
            editorTheme : "eclipse",
            //markdown : md,
            codeFold : true,
            //syncScrolling : false,
            saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
            searchReplace : true,
            //watch : false,                // 关闭实时预览
            htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启
            //toolbar  : false,             //关闭工具栏
            //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
            emoji : true,
            taskList : true,
            tocm            : true,         // Using [TOCM]
            tex : true,                   // 开启科学公式TeX语言支持，默认关闭
            flowChart : true,             // 开启流程图支持，默认关闭
            sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
            //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
            //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
            //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
            //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
            //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "{{route('upload.picture')}}",
        });

        var ngNode = $("div[ng-node=operate]");

        ngNode.find("button.btn-primary").on('click',function () {
            document.getElementsByName('markdown')[0].value = '';
            if($.trim(document.title)==''){
                return alert('不要忘记填写标题!');
            }
            document.getElementsByName('markdown')[0].value = testEditor.getMarkdown();
            return addArticle.submit();
        });
    });
</script>
@endsection