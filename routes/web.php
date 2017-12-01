<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::group(['prefix'=>'article','namespace' => 'Article'],function(){
    /**
     * 获取文章列表
     */
    Route::get('/getArticleList','ArticleController@getArticleList')->name('getArticleList');
    /**
     * 获取单篇文章
     */
    Route::get('/getArticle','ArticleController@getArticle')->name('getArticle');
    /**
     * 添加文章
     */
    Route::get('/addArticle','ArticleController@addArticle')->name('addArticle');
    /*
     * 修改文章
     */
    Route::get('/modifyArticle','ArticleController@modifyArticle')->name('modifyArticle');
});

Route::group(['prefix' => 'auth','namespace' => 'Auth'],function(){

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    Route::get('/',function(){
        return redirect(route('home'));
    });
});

Route::group(['prefix' => 'admin','namespace'=>'Admin'],function(){
    //Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'AdminController@index')->name('home');
    Route::get('/blog', 'AdminController@blog')->name('blog');
    Route::get('/portfolio', 'AdminController@portfolio')->name('portfolio');
    Route::get('/forms', 'AdminController@forms')->name('forms');
    Route::get('/typography', 'AdminController@typography')->name('typography');
    Route::get('/bootstrapElements', 'AdminController@bootstrapElements')->name('bootstrapElements');
    Route::get('/bootstrapGrid', 'AdminController@bootstrapGrid')->name('bootstrapGrid');
});


