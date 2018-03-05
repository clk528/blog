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

/**
 * 网站主页面
 */
require_once __DIR__."/routes/main.php";
/**
 * 文章管理模块，是给ajax和未来API用的地方
 */

require_once __DIR__."/routes/article.php";
/**
 * 用户登录
 */
require_once __DIR__."/routes/auth.php";

/**
 * 后台模块
 */
require_once __DIR__."/routes/admin.php";

/**
 * 分类模块
 */
require_once __DIR__."/routes/categories.php";

/**
 * 标签模块
 */
require_once __DIR__."/routes/tag.php";

/**
 * 上传模块
 */
require_once __DIR__."/routes/upload.php";