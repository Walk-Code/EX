<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Support\Facades\DB;
use Zhuzhichao\IpLocationZh\Ip;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginEvent  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        //get 事件中的信息
        $user = $event->getUser();
        $agent = $event->getAgent();
        $ip = $event->getIp();
        $timestamp = $event->getTimestamp();

        $ip = $ip == "::1" ? "183.31.30.40" : $ip;//兼容本地测试
        //修改登录状态
        $user->status = 1;
        $user->save();
        
        //组装login数据
        $login_info = [
            'ip' => $ip,
            'login_time' => $timestamp,
            'user_id' => $user->id,
        ];

        //get ip 地理位置
        $address = Ip::find($ip);
        $login_info['address'] = implode(' ',$address);

        //get os
        $login_info['device'] = $agent->device();//设备名称
        $browser = $agent->browser();
        $login_info['browser'] = $browser." ".$agent->version($browser);//浏览器
        $platform = $agent->platform();
        $login_info['platform'] = $platform." ".$agent->version($platform);//操作系统
        $login_info['language'] = implode(",",$agent->languages());//语言
        //设备类型
        if($agent->isTablet()){
            $login_info['device_type'] = "tablet"; //设备名称
        }else if($agent->isMobile()){
            $login_info['device_type'] = "mobile"; //设备名称
        }else if($agent->isRobot()){
            $login_info['device_type'] = 'robot';//爬虫
            $login_info['device'] = $agent->robot();//爬虫名字

        }else{
            $login_info['device_type'] = "desktop";//桌面
        }

        $login_info['created_at'] = date("Y-m-d");
        $login_info['updated_at'] = date("Y-m-d H:i:s");
        
        DB::table("login_log")->insert($login_info);

    }
}
