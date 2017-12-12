<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-12
 * Time: 17:34
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    const CREATED_AT = 'created';

    const UPDATED_AT = 'modified';

    protected $dateFormat = "U";

    protected $fillable = [
        '*'
    ];
}