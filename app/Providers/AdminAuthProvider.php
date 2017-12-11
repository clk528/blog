<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-11
 * Time: 16:58
 */

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class AdminAuthProvider extends EloquentUserProvider
{
    /**
     *  Validate a user against the given credentials.
     * @param UserContract $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        return parent::validateCredentials($user, $credentials); // TODO: 这里把密码校验规则重写
    }
}