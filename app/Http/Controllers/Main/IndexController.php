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
use App\Services\ArticleTagMappingService;
use App\Services\TagService;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;
    /**
     * @var ArticleTagMappingService
     */
    protected $articleTagMappingService;
    /**
     * @var TagService
     */
    protected $tagService;

    /**
     * IndexController constructor.
     * @param ArticleService $articleService
     * @param ArticleTagMappingService $articleTagMappingService
     * @param TagService $tagService
     */
    public function __construct(ArticleService $articleService, ArticleTagMappingService $articleTagMappingService, TagService $tagService)
    {
        $this->articleService = $articleService;
        $this->articleTagMappingService = $articleTagMappingService;
        $this->tagService = $tagService;
    }

    /**
     * 文章的首页列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index()
    {
        $articleList = $this->articleService->getArticleList(); //获取文章
        return view('main.index')->with('page',$articleList);
    }

    /**
     * 文章分类列表
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function category($id)
    {
        request()->replace(['where' => ['category_id' => $id]]);
        $articleList = $this->articleService->getArticleList(); //获取文章
        return view('main.index')->with('page',$articleList);
    }

    /**
     * 根据标签获取文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function tags($id)
    {
        $articleIdList = $this->articleTagMappingService->getArticleIdList($id);
        request()->replace(['where' => [
            'with' => [
                'case' => 'in',
                'key' => 'id',
                'value' => $articleIdList
            ]
        ]]);

        $articleList = $this->articleService->getArticleList(); //获取文章

        return view('main.index')->with('page',$articleList);
    }

    /**
     * 文章详情页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function article($id)
    {
        $article = $this->articleService->getArticle($id, ['id', 'category_id', 'status', 'title', 'html', 'created']);
        if(empty($article)){
            abort(404);
        }

        $article->humanDate = Carbon::parse($article->created)->diffForHumans();

        $tagIdList = $this->articleTagMappingService->getTagIdList($id);

        $tags = $this->tagService->getTag(['with' => [
            'case' => 'in',
            'key' => 'id',
            'value' => $tagIdList
        ]]);

        $article->tags = $tags;

        return view('main.article', $article);
    }
}