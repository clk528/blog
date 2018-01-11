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
use Illuminate\Routing\Router;

class ArticleController extends Controller
{
    protected $articleService;
    /**
     * ArticleController constructor.
     * @param $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->middleware('auth');
        $this->articleService = $articleService;
    }

    /**
     * 预览文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preview($id)
    {
        $article = $this->articleService->getArticle($id,['title','html']);
        return view('admin.preview',$article);
    }
    /**
     *  保存文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveArticle()
    {
        $article = $this->articleService->addArticle();

//        $data = [
//            'title' =>  '添加成功',
//            'page'  =>  'blog',
//            'article'   => $article
//        ];
        return \Redirect::route('blog');
        //return view('admin.status',$data);
    }
    /**
     * 进入编辑页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editArticle($id)
    {
        $article = $this->articleService->getArticle($id,['id','title','subtitle','category_id','markdown']);
        $category = \DB::table('categories')->get(['id','name']);

        $tag = \DB::table('tags')->get(['id','name']);


        $data = [
            'isEdit' => true,
            'title' =>  '-编辑文章',
            'page'  =>  'blog',
            'category' => $category,
            'article'   => $article,
            'tags' => $tag
        ];

        return view('admin.addArticle',$data);
    }

    /**
     * 保存编辑
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveEditArticle()
    {
        $this->articleService->saveEditArticle();
        return \Redirect::route('blog');
    }
}