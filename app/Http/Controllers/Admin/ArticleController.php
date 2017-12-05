<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-05
 * Time: 11:38
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    /**
     * ArticleController constructor.
     * @param $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     *  保存文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveArticle()
    {
        $article = $this->articleService->addArticle();

        $data = [
            'title' =>  '添加成功',
            'page'  =>  'blog',
            'article'   => $article
        ];

        return view('admin.status',$data);
    }
}