<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:20
 */

namespace App\Services;
use App\Repositories\CategoriesRepository;

class CategoriesService
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getCategoriesList()
    {
        return $this->categoriesRepository->getCategoriesList();
    }

    /**
     * @return bool
     */
    public function addCategories()
    {
        $name = request('name');
        return $this->categoriesRepository->addCategories($name);
    }

    public function deleteCategories()
    {
        $id = request('id');
        return $this->categoriesRepository->deleteCategories($id);
    }

    public function updateCategories()
    {
        $name = request('name');
        $id = request('id');
        return $this->categoriesRepository->updateCategories($id,$name);
    }
}