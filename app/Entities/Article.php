<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-29
 * Time: 17:24
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
//use Carbon\Carbon;

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
        'create_user',
        'modify_user'
    ];

    public function getCreatedAttribute($date)
    {
        return date('Y-m-d H:i:s',$date);
        //return Carbon::parse(date('Y-m-d H:i:s',$date))->diffForHumans();
    }
}