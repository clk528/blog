<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 05/03/2018
 * Time: 10:55 AM
 */

Route::group(['middleware' => ['auth'],'prefix' => 'tag','namespace' => 'Tags'],function(\Illuminate\Routing\Router $router){
    $router->post('/getTagList','TagController@getTagList');

    $router->post('/addTag','TagController@addTag');

    $router->post('/deleteTag','TagController@deleteTag');

    $router->post('/updateTag','TagController@updateTag');
});