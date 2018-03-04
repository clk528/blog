<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:39
 */
Route::group(['prefix'=>'upload','namespace' => 'Upload'],function(\Illuminate\Routing\Router $router){
    $router->post('picture','UploadController@upload')->name('upload.picture');
});