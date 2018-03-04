<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 2018/3/4 0004
 * Time: 17:20
 */

namespace App\Http\Controllers\Categories;
use App\Services\CategoriesService;
use Illuminate\Http\Request;
use Validator;

class CategoriesController
{
    protected $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoriesList()
    {
        $data = $this->categoriesService->getCategoriesList();
        return \Response::json($data);
    }

    public function addCategories(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()){
            return \Response::json(['code'=>0,'message'=>'分类名称不能为空']);
        }

        $result = $this->categoriesService->addCategories();

        if($result){
            $result = $result->toArray();
            return \Response::json(array_merge(['code'=>1,'message'=>'添加成功'],$result));
        }

        return \Response::json(['code'=>0,'message'=>'添加失败']);
    }

    public function deleteCategories(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required'
        ]);

        if($validator->fails()){
            return \Response::json(['code'=>0,'message'=>'分类名称不能为空']);
        }

        $result = $this->categoriesService->deleteCategories();

        if($result){
            return \Response::json(['code'=>1,'message'=>'删除成功']);
        }

        return \Response::json(['code'=>0,'message'=>'删除失败']);
    }

    public function updateCategories(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'id' => 'required'
        ]);

        if($validator->fails()){
            return \Response::json(['code'=>0,'message'=>'分类名称不能为空']);
        }

        $result = $this->categoriesService->updateCategories();

        if($result){
            return \Response::json(['code'=>1,'message'=>'更新成功']);
        }

        return \Response::json(['code'=>0,'message'=>'更新失败']);
    }
}