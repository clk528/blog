<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:32
 */

Route::group(['middleware' => ['auth'],'prefix' => 'cate','namespace' => 'Categories'],function(\Illuminate\Routing\Router $router){
    $router->post('/getCategoriesList','CategoriesController@getCategoriesList');

    $router->post('/addCategories','CategoriesController@addCategories');

    $router->post('/deleteCategories','CategoriesController@deleteCategories');

    $router->post('/updateCategories','CategoriesController@updateCategories');
});