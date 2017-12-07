<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-06
 * Time: 17:41
 */
namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

use App\Services\ArticleService;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * @var ArticleService3
     */
    protected $articleService;

    /**
     * IndexController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService )
    {
        $this->articleService = $articleService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        request()->replace(['where'=>['status'=>0]]);
        $articleList = $this->articleService->getArticleList();

        if(!$articleList->isEmpty()){
            $articleList->map(function($item){
                $item->humanDate = Carbon::parse($item->created)->diffForHumans();
            });
        }

        return view('main.index',$articleList);
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function article($id)
    {
        $article = $this->articleService->getArticle($id,['id','title','tag','create_user as createUser','modify_user as modifyUser','created','modified']);

        $article->humanDate = Carbon::parse($article->created)->diffForHumans();

        return view('main.article',$article);
    }

    /**
     * 预览页面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preview($id)
    {
        $article = $this->articleService->getArticle($id,['title','html'])->toArray();
        return view('main.preview',$article);
    }
}