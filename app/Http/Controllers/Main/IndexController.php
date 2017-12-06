<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-06
 * Time: 17:41
 */
namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    function index()
    {
        return view('main.index');
    }

    function article()
    {
        return view('welcome');
    }
}