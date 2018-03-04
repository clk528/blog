!(function ($) {
    function categories()
    {
        this._token = token.value;
        this._event();
        return this._init();
    }
    categories.prototype = {
        _token:null,
        _init:function () {
            $.ajax({
                url:'/cate/getCategoriesList',
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
            layer.prompt({title: '输入分类名称',move:false },function(val, index){
                layer.close(index);
                $.ajax({
                    url:'/cate/addCategories',
                    type:'post',
                    data:{
                        _token:token.value,
                        name:val
                    },
                    success:function (response) {
                        if(response.code == 1){
                            layer.alert('添加成功');

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
                            layer.alert('添加失败', {
                                icon: 2
                            });
                        }
                    },
                    error:function (error) {
                        layer.alert('添加失败', {
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

            layer.prompt({title: '编辑分类名称',move:false,value:text },function(val, index){
                layer.close(index);

                $.ajax({
                    url:'/cate/updateCategories',
                    type:'post',
                    data:{
                        _token:token.value,
                        name:val,
                        id:id
                    },
                    success:function (response) {
                        if(response.code == 1){
                            $(that).parent().siblings(':eq(1)').text(val);
                            layer.alert('编辑成功');
                        } else {
                            layer.alert('编辑失败', {
                                icon: 2
                            });
                        }
                    },
                    error:function (error) {
                        layer.alert('编辑失败', {
                            icon: 2
                        });
                    }
                });
            });
        },
        _delete:function () {
            var id = $(this).data('id'),
                that = this;

            layer.confirm('确定删除这个分类吗？',  function(){

                $.ajax({
                    url:'/cate/deleteCategories',
                    type:'post',
                    data:{
                        _token:token.value,
                        id:id
                    },
                    success:function (response) {
                        if(response.code == 1){
                            $(that).parents('tr').remove();
                            layer.alert('删除成功');
                        } else {
                            layer.alert('删除失败', {
                                icon: 2
                            });
                        }
                    },
                    error:function (error) {
                        layer.alert('删除失败', {
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
    new categories();
})(jQuery);