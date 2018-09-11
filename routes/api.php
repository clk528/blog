<?php

//use Illuminate\Http\Request;
use \Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'article', 'namespace' => 'Article'], function (Router $router) {
    $router->post('/', 'ArticleController@getArticleList')->name('api.article.getArticleList');
    $router->post('/getArticle','ArticleController@getArticle')->name('api.article.getArticle');
});
