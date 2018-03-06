<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/6 0006
 * Time: 20:36
 */

namespace App\Services;
use App\Repositories\ArticleTagMappingRepository;

class ArticleTagMappingService
{
    protected $articleTagMappingRepository;

    public function __construct(ArticleTagMappingRepository $articleTagMappingRepository)
    {
        $this->articleTagMappingRepository = $articleTagMappingRepository;
    }

    /**
     * @param $tagId
     * @return array
     */
    public function getArticleIdList($tagId)
    {
        return $this->articleTagMappingRepository->getArticleIdList($tagId);
    }

    /**
     * @param $articleId
     * @return array
     */
    public function getTagIdList($articleId)
    {
        return $this->articleTagMappingRepository->getTagIdList($articleId);
    }
}