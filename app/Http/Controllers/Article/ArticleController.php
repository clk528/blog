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
     * @param Request $request
     * @return mixed
     */
    public function getArticle(Request $request)
    {
        return $this->apiResponse->withItem($this->articleService->getArticle(),new ArticleTransform);
    }
}