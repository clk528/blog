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
     * @return mixed
     */
    public function getArticleList()
    {
        return $this->apiResponse->withItem($this->articleService->getArticleList(),new ArticleTransform);
    }

    /**
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
}