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

    public function getArticle()
    {
        return $this->articleRepository->getArticle();
    }
}