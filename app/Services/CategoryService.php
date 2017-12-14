<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-13
 * Time: 14:21
 */

namespace App\Services;

use App\Repositories\CategoryRepository;
class CategoryService
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * 获取标签
     * @return array
     */
    function getCategories(){
        return $this->categoryRepository->getCategories();
    }
}