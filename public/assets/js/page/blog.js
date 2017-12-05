!(function ($) {
    function Blog() {
        this.nav = $("#page-wrapper ul:eq(0)");
        this.nav.find('a:eq(0)').on('click',{that:this},this._onSale);
        this.nav.find('a:eq(1)').on('click',{that:this},this._unShelf);
        this.nav.find('a:eq(2)').on('click',{that:this},this._unPublish);
    }
    Blog.prototype = {
        _init(){
            var that = this;
            that._getData('/article/getArticleList',{
                _token:token.value,
                where:{
                    status:1
                },
                page:1
            }).then(function (data) {
                var list = data.data.data;
                for(var i in list){
                    $("#onsale table tbody").append(that._template(list[i]));
                }
                if(data.data.total>20) {
                    $("#onsale div[ng-node]").Pagination({
                        itemsCount:data.data.total,
                        pageSize:data.data.last_page,
                        currentPage:1,
                        onSelect:function (a) {
                            return that._unShelf(obj,a);
                        }
                    });
                }
            });
        },
        _onSale(obj,page){
            var that = obj.data.that,
                page = page || 1;
            if($("#onsale table tbody").html()!=='' && page == undefined){
                return;
            }
            that._getData('/article/getArticleList',{
                _token:token.value,
                where:{
                    status:1
                },
                page:page
            }).then(function (data) {
                var list = data.data.data;
                for(var i in list){
                    $("#onsale table tbody").append(that._template(list[i]));
                }

                if(data.data.total>20) {
                    $("#onsale div[ng-node]").Pagination({
                        itemsCount:data.data.total,
                        pageSize:data.data.last_page,
                        currentPage:1,
                        onSelect:function (a) {
                            return that._unShelf(obj,a);
                        }
                    });
                }
            });
        },
        _unShelf(obj,page){
            if($("#unshelf table tbody").html()!=='' && page == undefined){
                return;
            }
            var that = obj.data.that,
                page = page || 1;
            that._getData('/article/getArticleList',{
                _token:token.value,
                where:{
                    status:2
                },
                page:page
            }).then(function (data) {
                var list = data.data.data;
                for(var i in list){
                    $("#unshelf table tbody").append(that._template(list[i]));
                }
                if(data.data.total>20) {
                    $("#unshelf div[ng-node]").Pagination({
                        itemsCount: data.data.total,
                        pageSize: data.data.last_page,
                        currentPage: page,
                        onSelect: function (a) {
                            return that._unShelf(obj, a);
                        }
                    });
                }
            });
        },
        _unPublish(obj,page){
            if($("#unpublish table tbody").html()!=='' && page == undefined){
                return;
            }
            var that = obj.data.that,
                page = page || 1;

            that._getData('/article/getArticleList',{
                _token:token.value,
                where:{
                    status:0
                },
                page:page
            }).then(function (data) {
                var list = data.data.data;
                $("#unpublish table tbody").empty();
                for(var i in list){
                    $("#unpublish table tbody").append(that._template(list[i]));
                }
                if(data.data.total>20) {
                    $("#unpublish div[ng-node]").Pagination({
                        itemsCount: data.data.total,
                        pageSize: data.data.last_page,
                        currentPage: page,
                        onSelect: function (a) {
                            return that._unPublish(obj, a);
                        }
                    });
                }
            });
        },
        _getData(url,params){
            return $.ajax({
                type:'post',
                dataType:'json',
                url:url,
                data:params
            });
        },
        _template(it){
            var str = '' +
                '<tr>'+
                    '<td>' + it.id + '</td>' +
                    '<td>' + it.title +'</td>' +
                    '<td>' + it.tag +'</td>' +
                    '<td>' + (function (s) {
                            if(s==0){
                                return '待发表';
                            }
                            if(s==1){
                                return '已发表';
                            }
                            if(s==2){
                                return '已下架';
                            }
                        }
                    )(it.status) + '</td>' +
                    '<td>' + (new Date(it.created * 1000)).format() + '</td>' +
                    '<td>' + (new Date(it.modified * 1000)).format() + '</td>' +
                    '<td>' + (function (s) {
                            if(s==0){
                                return '<button class="btn btn-success btn-xs" style="margin-right: 5px;"><span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span>查看</button>' +
                                    '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>下架</button>';
                            }
                            if(s==1){
                                return '<button class="btn btn-danger btn-xs" style="margin-right: 5px;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>删除</button>' +
                                    '<button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>编辑</button>';
                            }
                            if(s==2){
                                return '<button class="btn btn-danger btn-xs"  style="margin-right: 5px;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>删除</button>' +
                                    '<button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>编辑</button>';
                            }
                        })(it.status) +
                    '</td>' +
                '</tr>';
            return str;
        }
    }
    var b = new Blog();
    b._init();
})(jQuery);