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

class RegisterListener
{    /**
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
        $d = $event->user->toArray();
        \Log::info(json_encode($d));

        $name = '学院君';
        $flag = Mail::send('welcome',['name'=>$name],function($message){
            $to = 'clk528@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
    }
}