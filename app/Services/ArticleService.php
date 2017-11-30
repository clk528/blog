<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-30
 * Time: 10:04
 */

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    protected $articleRepository;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * 获取文章列表
     * @return mixed
     */
    public function getArticleList()
    {
        return $this->articleRepository->getArticleList();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getArticle($id)
    {
        return $this->articleRepository->getArticle($id);
    }
}