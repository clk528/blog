<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-29
 * Time: 17:26
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const CREATED_AT = "created";

    const UPDATED_AT = "modified";

    protected $dateFormat = "U";

    protected $fillable = [
        'cid',
        'aid',
        'content',
        'type',
        'create_user',
        'modify_user'
    ];
}