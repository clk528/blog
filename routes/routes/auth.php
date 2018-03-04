<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:33
 */
/**
 * 用户登录
 */
Route::group(['prefix' => 'auth','namespace' => 'Auth'],function(\Illuminate\Routing\Router $router){

    // Authentication Routes...
    $router->get('login', 'LoginController@showLoginForm')->name('login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $router->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $router->post('register', 'RegisterController@register');

    // Password Reset Routes...
    $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $router->post('password/reset', 'ResetPasswordController@reset');

    $router->get('/',function(){
        return redirect(route('home'));
    });
});