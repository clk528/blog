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
use App\Services\CategoryService;
use App\Services\TagService;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;
    /**
     * @var CategoryService
     */
    protected $categoryService;
    /**
     * @var TagService
     */
    protected $tagService;
    /**
     * IndexController constructor.
     * @param ArticleService $articleService
     * @param CategoryService $categoryService
     * @param TagService $tagService
     */
    public function __construct(ArticleService $articleService ,CategoryService $categoryService ,TagService $tagService)
    {
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        request()->replace(['where'=>['status'=>1]]);

        $articleList = $this->articleService->getArticleList(); //获取文章

        $Categories = $this->categoryService->getCategories();//获取类别

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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function article($id)
    {
        $article = $this->articleService->getArticle($id,['id','title','category_id','create_user as createUser','modify_user as modifyUser','created','modified']);

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