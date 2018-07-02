<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-12-12
 * Time: 11:21
 */

namespace App\Listeners;

use App\Events\RegisterEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class RegisterListener
{
    /**
     * RegisterListener constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param RegisterEvent $event
     */
    public function handle(RegisterEvent $event)
    {
        $user = $event->user;
        Mail::send('welcome', ['name' => config('app.name')], function (Message $message) use ($user) {
            $to = 'clk528@qq.com';
            $message->to($user['email'])->subject('恭喜你注册成功');
        });
    }
}