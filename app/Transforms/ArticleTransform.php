<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-30
 * Time: 13:16
 */

namespace App\Transforms;

use League\Fractal\TransformerAbstract;

class ArticleTransform extends TransformerAbstract
{
    public function transform($data)
    {
        return is_object($data) ? $data->toArray() : $data;
//        $data =  is_object($data) ? $data->toArray() : $data;
//
//        if(empty($data))
//        {
//            return [];
//        }
//
//        if(isset($data['data'])){
//            $data['data'] = collect($data['data'])->each(function($v,$k){
//                return [
//                    $k => stringToCamel($v)
//                ];
//            })->toArray();
//        } else {
//            foreach ($data as $k=>$v){
//                $data[$k] = stringToCamel($v);
//            }
//        }
//
//        return $data;
    }
}