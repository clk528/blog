@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="{{asset('assets/components/editorMd/css/editormd.min.css')}}" />
    <script src="{{asset('assets/components/editorMd/editormd.min.js')}}"></script>
@endsection

@section('content')
    <div id="page-wrapper">
        <h2>{{isset($isEdit) ? '编辑文章':'添加文章'}} </h2><br>
        <form class="form-inline" name="addArticle" method="post" action="{{isset($isEdit) ? route('saveEditArticle'):route('saveArticle')}}">
            <div class="form-group">
                <label for="title">标题(<span style="color: red"> *</span>)：</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="文章标题" value="{{isset($isEdit) ? $article['title'] : ''}}">
                <input type="hidden" name="markdown">
                <input type="hidden" name="html">
                @if(isset($isEdit))
                    <input type="hidden" name="id" value="{{$article['id']}}">
                @endif
                {{csrf_field()}}
            </div>
            <div class="form-group">
                <label for="subtitle">副标题(<span style="color: red"> *</span>)：</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="副标题"  value="{{isset($isEdit) ? $article['subtitle'] : ''}}">
            </div>
            <div class="form-group">
                <label for="category">分类(<span style="color: red"> *</span>)：</label>
                <select id="category" class="form-control" name="category">
                    <option selected value="">选择分类</option>
                    @foreach($category as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">标签(<span style="color: red"> *</span>)：</label>
                <span class="tags">
                    <input type="hidden" name="tags[]" value="PHP">
                    PHP <a class="remove" style="text-decoration: none;">&times;</a>
                </span>
                <span class="tags" name="tags[]" value="NGINX">
                    <input type="hidden" name="tags[]" value="NGINX">
                    NGINX <a class="remove" style="text-decoration: none;">&times;</a>
                </span>
                <span class="tags" name="tags[]" value="LUA">
                    <input type="hidden" name="tags[]" value="LUA">
                    LUA
                    <a class="remove" style="text-decoration: none;">&times;</a>
                </span>
                <select id="tag" class="form-control">
                    <option selected>选择标签</option>
                    <option>PHP</option>
                    <option>LIFE</option>
                    <option>MySQL</option>
                    <option>NGINX</option>
                </select>
            </div>
        </form>
        <hr>
        <div id="test-editormd"></div>
        @if(isset($isEdit))
            <textarea id="markdown" style="display: none;">
{!!$article['markdown']!!}
            </textarea>
        @endif

        <div class="text-center" ng-node="operate">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> 保存</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript:history.back();" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> 取消</a>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    var testEditor,
        md = {!!isset($isEdit) ? '$("#markdown").text()': '""'!!};
    $(function() {
        testEditor = editormd("test-editormd", {
            width: "90%",
            height: 700,
            path : '{{asset('assets/components/editorMd/lib')}}/',
            theme : "default",
            previewTheme : "default",
            editorTheme : "eclipse",
            markdown : md,
            codeFold : true,
            saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
            searchReplace : true,
            htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启

            emoji : true,
            taskList : true,
            tocm            : true,         // Using [TOCM]
            tex : true,                   // 开启科学公式TeX语言支持，默认关闭
            flowChart : true,             // 开启流程图支持，默认关闭
            sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "{{route('upload.picture')}}",
        });

        var ngNode = $("div[ng-node=operate]");

        ngNode.find("button.btn-primary").on('click',function () {
            document.getElementsByName('markdown')[0].value = '';
            document.getElementsByName('html')[0].value = '';

            if($.trim(document.title)==''){
                return alert('不要忘记填写标题!');
            }
            document.getElementsByName('markdown')[0].value = testEditor.getMarkdown();
            document.getElementsByName('html')[0].value = testEditor.getPreviewedHTML();
            return addArticle.submit();
        });
    });
</script>
@endsection