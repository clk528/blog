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
     * 获取单篇文章
     * @param $id
     * @param array $args
     * @return mixed
     */
    public function getArticle($id,array $args = [])
    {
        return $this->articleRepository->getArticle($id,$args);
    }

    /**
     * 添加一篇文章
     * @return mixed
     */
    public function addArticle()
    {
        return $this->articleRepository->addArticle();
    }

    /**
     * 修改文章
     * @return bool
     */
    public function modifyArticle()
    {
        return $this->articleRepository->modifyArticle();
    }
}