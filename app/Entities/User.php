<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    const CREATED_AT = "created";

    const UPDATED_AT = "modified";

    protected $dateFormat = "U";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user',
        'alias',
        'password',
        'role',
        'email',
        'github',
        'weibo',
        'facebook',
        'status',
        'create_user',
        'modifiy_user',
        'login_time'
    ];
}
