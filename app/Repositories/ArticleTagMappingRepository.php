<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/6 0006
 * Time: 20:36
 */

namespace App\Repositories;

use App\Entities\ArticleTagMapping;

class ArticleTagMappingRepository
{
    protected $articleTagMapping;

    public function __construct(ArticleTagMapping $articleTagMapping)
    {
        $this->articleTagMapping = $articleTagMapping;
    }

    /**
     * @param $tagId
     * @return array
     */
    public function getArticleIdList($tagId)
    {
        $list = $this->articleTagMapping->whereTagId($tagId)->get(['article_id']);

        if($list->isEmpty()){
            return [];
        }
        return $list->pluck('article_id')->toArray();
    }

    /**
     * @param $articleId
     * @return array
     */
    public function getTagIdList($articleId)
    {
        $list = $this->articleTagMapping->whereArticleId($articleId)->get(['tag_id']);
        if($list->isEmpty()){
            return [];
        }
        return $list->pluck('tag_id')->toArray();
    }
}