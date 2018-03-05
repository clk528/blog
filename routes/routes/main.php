<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:37
 */
Route::group(['namespace' => 'Main'],function(\Illuminate\Routing\Router $router){
    /**
     * 首页面
     */
    $router->get('/', 'IndexController@index')->name('main.index');
    /**
     * 文章页
     */
    $router->get('/article/{id}.zhuangbi','IndexController@article')->name('main.detail');

    $router->get('/category/{id}','IndexController@category')->name('main.category');

    $router->get('/tags/{id}','IndexController@tags')->name('main.tags');

});