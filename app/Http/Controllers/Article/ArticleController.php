<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-30
 * Time: 10:28
 */
namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;

use App\Services\ArticleService;
use App\Transforms\ArticleTransform;
use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Article
 */
class ArticleController extends Controller
{
    /**
     * @var ArticleService3
     */
    protected $articleService;
    /**
     * @var ApiResponse
     */
    protected $apiResponse;

    /**
     * ArticleController constructor.
     * @param ArticleService $articleService
     * @param ApiResponse $apiResponse
     */
    public function __construct(ArticleService $articleService , ApiResponse $apiResponse)
    {
        $this->articleService = $articleService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * 获取文章列表
     * @return mixed
     */
    public function getArticleList()
    {
        return $this->apiResponse->withItem($this->articleService->getArticleList(),new ArticleTransform);
    }

    /**
     * 获取单篇文章
     * @param Request $request
     * @return mixed
     */
    public function getArticle(Request $request)
    {
        $id = $request->input('id','');
        if (empty($id)){
            return $this->apiResponse->withArray(['code'=>0,'message'=>'去你大爷的']);
        }
        return $this->apiResponse->withItem($this->articleService->getArticle($id),new ArticleTransform);
    }

    /**
     * 添加一篇文章
     * @return mixed
     */
    public function addArticle()
    {
        return $this->apiResponse->withItem($this->articleService->addArticle(),new ArticleTransform);
    }

    /**
     * 修改文章
     * @return mixed
     */
    public function modifyArticle()
    {
        \DB::enableQueryLog();
        $this->apiResponse->withItem([$this->articleService->modifyArticle()],new ArticleTransform);
        $log = \DB::getQueryLog();
        dd($log);
    }

    /**
     * 下线一篇文章
     * @param Request $request
     * @return mixed
     */
    public function downArticle(Request $request)
    {
        $id = $request->input('id','');
        if (empty($id)){
            return $this->apiResponse->withArray(['code'=>0,'message'=>'去你大爷的']);
        }

        return $this->apiResponse->withArray(['code'=>$this->articleService->downArticle($id),'message'=>'成功']);
    }
    /**
     * 上线一篇文章
     * @param Request $request
     * @return mixed
     */
    public function upArticle(Request $request)
    {
        $id = $request->input('id','');
        if (empty($id)){
            return $this->apiResponse->withArray(['code'=>0,'message'=>'去你大爷的']);
        }
        return $this->apiResponse->withArray(['code'=>$this->articleService->upArticle($id),'message'=>'成功']);
    }
    /**
     * 删除文章
     * @param Request $request
     * @return mixed
     */
    public function deleteArticle(Request $request)
    {
        $id = $request->input('id','');
        if (empty($id)){
            return $this->apiResponse->withArray(['code'=>0,'message'=>'去你大爷的']);
        }
        return $this->apiResponse->withArray(['code'=>$this->articleService->deleteArticle($id),'message'=>'成功']);
    }
}