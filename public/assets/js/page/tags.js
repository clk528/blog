!(function ($) {
    function tags()
    {
        this._token = token.value;
        this._event();
        return this._init();
    }
    tags.prototype = {
        _token:null,
        _init:function () {
            $.ajax({
                url:'/tag/getTagList',
                type:'post',
                data:{
                    _token:this._token
                },
                success:function (response) {
                    var data = response.data;
                    var tpl = '';

                    for(var i in data){
                        tpl += '' +
                            '<tr>' +
                            '<td>' + data[i].id + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].create_user + '</td>' +
                            '<td>' + data[i].modify_user + '</td>' +
                            '<td>' + data[i].created + '</td>' +
                            '<td>' + data[i].modified + '</td>' +
                            '<td>' +
                            '<button type="button" data-id="' +data[i].id + '" name="delete" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>删除</button>　' +
                            '<button type="button" data-id="' +data[i].id + '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>编辑</button></td>' +
                            '</tr>';
                    }
                    $("#tbody").html(tpl);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        },
        _addCategories:function () {
            layer.prompt({title: '输入标签名称',move:false },function(val, index){
                layer.close(index);
                $.ajax({
                    url:'/tag/addTag',
                    type:'post',
                    data:{
                        _token:token.value,
                        name:val
                    },
                    success:function (response) {
                        if(response.code == 1){
                            layer.msg('添加成功',{
                                icon:1
                            });

                            var tpl = '' +
                                '<tr>' +
                                '<td>' + response.id + '</td>' +
                                '<td>' + val + '</td>' +
                                '<td>' + response.create_user + '</td>' +
                                '<td>' + response.modify_user + '</td>' +
                                '<td>' + response.created + '</td>' +
                                '<td>' + response.modified + '</td>' +
                                '<td>' +
                                '<button type="button" data-id="' +response.id + '" name="delete"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>删除</button>　' +
                                '<button type="button" data-id="' +response.id + '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>编辑</button></td>' +
                                '</tr>';

                            $("#tbody").append(tpl);

                        } else {
                            layer.msg('添加失败', {
                                icon: 2
                            });
                        }
                    },
                    error:function (error) {
                        layer.msg('添加失败', {
                            icon: 2
                        });
                    }
                });
            });
        },
        _edit:function () {
            var id = $(this).data('id'),
                text = $(this).parent().siblings(':eq(1)').text(),
                that = this;

            layer.prompt({title: '编辑标签名称',move:false,value:text },function(val, index){
                layer.close(index);

                $.ajax({
                    url:'/tag/updateTag',
                    type:'post',
                    data:{
                        _token:token.value,
                        name:val,
                        id:id
                    },
                    success:function (response) {
                        if(response.code == 1){
                            $(that).parent().siblings(':eq(1)').text(val);
                            layer.msg('编辑成功',{
                                icon:1
                            });
                        } else {
                            layer.msg('编辑失败', {
                                icon: 2
                            });
                        }
                    },
                    error:function (error) {
                        layer.msg('编辑失败', {
                            icon: 2
                        });
                    }
                });
            });
        },
        _delete:function () {
            var id = $(this).data('id'),
                that = this;

            layer.confirm('确定删除这个标签吗？',  function(){

                $.ajax({
                    url:'/tag/deleteTag',
                    type:'post',
                    data:{
                        _token:token.value,
                        id:id
                    },
                    success:function (response) {
                        if(response.code == 1){
                            $(that).parents('tr').remove();
                            layer.msg('删除成功',{
                                icon:1
                            });
                        } else {
                            layer.msg('删除失败', {
                                icon: 2
                            });
                        }
                    },
                    error:function (error) {
                        layer.msg('删除失败', {
                            icon: 2
                        });
                    }
                });

            });
        },
        _event:function () {
            $("button[name=addCategories]").on('click',this._addCategories);

            $(document).on('click','button[name=edit]',this._edit);
            $(document).on('click','button[name=delete]',this._delete);
        },
        _pageChange:function(page){

        }
    };
    new tags();
})(jQuery);