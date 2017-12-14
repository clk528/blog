<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-13
 * Time: 14:47
 */

namespace App\Repositories;

use App\Entities\Tag;

class TagRepository
{
    /**
     * @var Tag
     */
    protected $tag;

    /**
     * TagRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * 获取分类
     * @return array
     */
    function getTag()
    {
        return $this->tag->all(['id','name'])->toArray();
    }
}