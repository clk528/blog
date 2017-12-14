<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-13
 * Time: 14:46
 */

namespace App\Repositories;

use App\Entities\Categorie;

class CategoryRepository
{
    /**
     * @var Categorie
     */
    protected $categorie;

    /**
     * CategoryRepository constructor.
     * @param Categorie $categorie
     */
    public function __construct(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * 获取分类
     * @return array
     */
    function getCategories()
    {
        return $this->categorie->all(['id','name'])->toArray();
    }
}