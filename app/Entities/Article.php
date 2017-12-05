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
        'markdown',
        'html',
        'tag',
        'status',
        'create_user',
        'modify_user'
    ];
}