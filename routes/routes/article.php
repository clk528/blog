<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:35
 */
/**
 * 文章管理模块，是给ajax和未来API用的地方
 */
Route::group(['prefix'=>'article','namespace' => 'Article'],function(\Illuminate\Routing\Router $router){
    /**
     * 获取文章列表
     */
    $router->post('/getArticleList','ArticleController@getArticleList')->name('getArticleList');
    /**
     * 获取单篇文章
     */
    $router->post('/getArticle','ArticleController@getArticle')->name('getArticle');
    /**
     * 添加文章
     */
    $router->post('/addArticle','ArticleController@addArticle')->name('addArticle');
    /*
     * 修改文章
     */
    $router->post('/modifyArticle','ArticleController@modifyArticle')->name('modifyArticle');
    /**
     * 下线文章
     */
    $router->post('/downArticle','ArticleController@downArticle')->name('downArticle');
    /**
     * 上线文章
     */
    $router->post('/upArticle','ArticleController@upArticle')->name('upArticle');
    /**
     * 删除文章
     */
    $router->post('/deleteArticle','ArticleController@deleteArticle')->name('deleteArticle');
});