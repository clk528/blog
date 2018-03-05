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
use App\Services\CategoriesService;
use App\Services\TagService;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;
    /**
     * @var CategoriesService
     */
    protected $categoriesService;
    /**
     * @var TagService
     */
    protected $tagService;
    /**
     * IndexController constructor.
     * @param ArticleService $articleService
     * @param CategoriesService $categoriesService
     * @param TagService $tagService
     */
    public function __construct(ArticleService $articleService ,CategoriesService $categoriesService ,TagService $tagService)
    {
        $this->articleService = $articleService;
        $this->categoriesService = $categoriesService;
        $this->tagService = $tagService;
    }

    /**
     * 文章的首页列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        request()->replace(['where'=>['status'=>1]]);

        $articleList = $this->articleService->getArticleList(); //获取文章

        $Categories = $this->categoriesService->getCategories();//获取类别

        $tag = $this->tagService->getTag();//获取标签

        if(!$articleList->isEmpty()){
            $articleList->map(function($item){
                $item->humanDate = Carbon::parse($item->created)->diffForHumans();
            });
        }

        $data = [
            'categories' => $Categories,
            'tags' => $tag,
        ];

        return view('main.index',array_merge($data,$articleList->toArray()));
    }

    /**
     * 文章分类列表
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function category($id)
    {
        request()->replace(['where' => ['status'=>1,'category_id' => $id]]);

        $articleList = $this->articleService->getArticleList(); //获取文章

        $Categories = $this->categoriesService->getCategories();//获取类别

        $tag = $this->tagService->getTag();//获取标签

        if(!$articleList->isEmpty()){
            $articleList->map(function($item){
                $item->humanDate = Carbon::parse($item->created)->diffForHumans();
            });
        }

        $data = [
            'categories' => $Categories,
            'tags' => $tag,
        ];

        return view('main.index',array_merge($data,$articleList->toArray()));
    }

    /**
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function tags($id)
    {
        request()->replace(['where' => ['status'=>1,'category_id' => $id]]);

        $articleList = $this->articleService->getArticleList(); //获取文章

        $Categories = $this->categoriesService->getCategories();//获取类别

        $tag = $this->tagService->getTag();//获取标签

        if(!$articleList->isEmpty()){
            $articleList->map(function($item){
                $item->humanDate = Carbon::parse($item->created)->diffForHumans();
            });
        }

        $data = [
            'categories' => $Categories,
            'tags' => $tag,
        ];

        return view('main.index',array_merge($data,$articleList->toArray()));
    }
    /**
     * 文章详情页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function article($id)
    {
        $article = $this->articleService->getArticle($id,['id','category_id','status','title','html','created']);

        $article->humanDate = Carbon::parse($article->created)->diffForHumans();

        return view('main.article',$article);
    }
}