<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-13
 * Time: 13:56
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const CREATED_AT = "created";

    const UPDATED_AT = "modified";

    protected $dateFormat = "U";

    protected $fillable = [
        '*'
    ];
}