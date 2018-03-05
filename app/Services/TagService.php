<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-13
 * Time: 14:24
 */

namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{
    /**
     * @var TagRepository
     */
    protected $tagRepository;

    /**
     * TagService constructor.
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * 获取标签
     * @return array
     */
    function getTag()
    {
        return $this->tagRepository->getTag();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTagList()
    {
        return $this->tagRepository->getTagList();
    }
    /**
     * @return bool
     */
    public function addTag()
    {
        $name = request('name');
        return $this->tagRepository->addTag($name);
    }

    /**
     * @return mixed
     */
    public function deleteTag()
    {
        $id = request('id');
        return $this->tagRepository->deleteTag($id);
    }

    /**
     * @return bool
     */
    public function updateTag()
    {
        $name = request('name');
        $id = request('id');
        return $this->tagRepository->updateTag($id,$name);
    }
}