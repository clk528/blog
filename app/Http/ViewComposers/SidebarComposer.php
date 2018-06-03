<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/6/3
 * Time: 17:07
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CategoriesService;
use App\Services\TagService;

class SidebarComposer
{
    protected $categoriesService;

    protected $tagService;


    public function __construct(CategoriesService $categoriesService, TagService $tagService)
    {
        $this->categoriesService = $categoriesService;
        $this->tagService = $tagService;
    }


    public function compose(View $view)
    {
        $view->with('categories', $this->categoriesService->getCategories())->with('tags', $this->tagService->getTag());
    }
}