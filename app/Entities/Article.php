<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-29
 * Time: 17:24
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const CREATED_AT = "created";

    const UPDATED_AT = "modified";

    protected $dateFormat = "U";

    protected $fillable = [
        'title',
        'subtitle',
        'markdown',
        'html',
        'tag',
        'status',
        'category_id',
        'create_user',
        'modify_user'
    ];

    /**
     * @param $date
     * @return false|string
     */
//    public function getCreatedAttribute($date)
//    {
//        return date('Y-m-d H:i:s',$date);
//    }
//
//    /**
//     * @param $date
//     * @return false|string
//     */
//    public function getModifiedAttribute($date)
//    {
//        return date('Y-m-d H:i:s',$date);
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Entities\Categorie','id','category_id');
    }

    /**
     * 将文章ID和tagsID关联
     * @param $articleId
     * @param $tagsArray
     */
    function mapping_tag_id($result,$tagsArray)
    {
        $data = collect($tagsArray)->map(function($tagId)use($result){
            return [
                'article_id' => $result->id,
                'create_user' => $result->create_user,
                'modify_user' => $result->create_user,
                'tag_id' => $tagId,
                'created' => time(),
                'modified' => time(),
            ];
        })->toArray();

        \App\Entities\ArticleTagMapping::insert($data);
    }
}