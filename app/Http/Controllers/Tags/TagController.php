<?php
/**
 * Created by PhpStorm.
 * User: clk
 * Date: 05/03/2018
 * Time: 10:44 AM
 */

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use Illuminate\Http\Request;
use Validator;

class TagController extends Controller
{
    /**
     * @var TagService
     */
    protected $tagService;

    /**
     * TagController constructor.
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTagList()
    {
        $data = $this->tagService->getTagList();
        return \Response::json($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addTag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()){
            return \Response::json(['code'=>0,'message'=>'标签名称不能为空']);
        }

        $result = $this->tagService->addTag();

        if($result){
            $result = $result->toArray();
            return \Response::json(array_merge(['code'=>1,'message'=>'添加成功'],$result));
        }

        return \Response::json(['code'=>0,'message'=>'添加失败']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required'
        ]);

        if($validator->fails()){
            return \Response::json(['code'=>0,'message'=>'标签名称不能为空']);
        }

        $result = $this->tagService->deleteTag();

        if($result){
            return \Response::json(['code'=>1,'message'=>'删除成功']);
        }

        return \Response::json(['code'=>0,'message'=>'删除失败']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTag(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'id' => 'required'
        ]);

        if($validator->fails()){
            return \Response::json(['code'=>0,'message'=>'标签名称不能为空']);
        }

        $result = $this->tagService->updateTag();

        if($result){
            return \Response::json(['code'=>1,'message'=>'更新成功']);
        }

        return \Response::json(['code'=>0,'message'=>'更新失败']);
    }
}