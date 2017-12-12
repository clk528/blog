<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-12
 * Time: 11:20
 */

namespace App\Events;

use App\Entities\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterEvent implements ShouldQueue
{
    use SerializesModels;

    public $user;

    /**
     * RegisterEvent constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}