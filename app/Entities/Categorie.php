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
        'id',
        'name',
        'create_user',
        'modify_user',
        'created',
        'modified'
    ];

    public function getCreatedAttribute($value)
    {
        return date('Y-m-d H:i:s',$value);
    }

    public function getModifiedAttribute($value)
    {
        return date('Y-m-d H:i:s',$value);
    }
}