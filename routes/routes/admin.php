<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:34
 */
/**
 * 后台模块
 */
Route::group(['prefix' => 'admin','namespace'=>'Admin'],function(\Illuminate\Routing\Router $router){
    //$router->get('/home', 'HomeController@index')->name('home');
    /**
     * 主要页面
     */
    $router->get('/', 'AdminController@index')->name('home');
    /**
     * 文章页面
     */
    $router->get('/blog', 'AdminController@blog')->name('blog');
    /**
     * 分类管理
     */
    $router->get('/categoriesManger','AdminController@categoriesManger')->name('categoriesManger');
    /**
     * 个人信息
     */
    $router->get('/profile', 'AdminController@profile')->name('profile');

    /**
     * 添加文章页面
     */
    $router->get('/addArticle', 'AdminController@addArticle')->name('addArticle');
    /**
     * 保存文章
     */
    $router->post('/saveArticle', 'ArticleController@saveArticle')->name('saveArticle');
    /**
     * 进入编辑页面
     */
    $router->get('/editArticle/{id}','ArticleController@editArticle')->name('editArticle');
    /**
     * 保存编辑
     */
    $router->post('/saveEditArticle','ArticleController@saveEditArticle')->name('saveEditArticle');
    /**
     * 预览界面
     */
    $router->get('/preview/{id}.html','ArticleController@preview')->name('preview');


    $router->get('/forms', 'AdminController@forms')->name('forms');
    $router->get('/typography', 'AdminController@typography')->name('typography');
    $router->get('/bootstrapElements', 'AdminController@bootstrapElements')->name('bootstrapElements');
    $router->get('/bootstrapGrid', 'AdminController@bootstrapGrid')->name('bootstrapGrid');
});