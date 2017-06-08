<?php
/**
 * Created by PhpStorm.
 * User: jianqi
 * Date: 2017/6/8
 * Time: 15:48
 */

namespace App\Listeners;


use Illuminate\Support\Facades\Log;

class UserEventSubscriber
{
    /**
     * 处理用户登录事件
     */
    public function onUserLogin($event)
    {
       //Log::info($event->name);
    }

    /**
     * 处理用户注销事件
     */
    public function onUserLogout($event)
    {
        
    }


    /**
     * 为订阅者注册监听器
     * 
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}