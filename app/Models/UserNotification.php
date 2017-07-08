<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserNotification extends Model
{
    public $table = "user_notifity";

    public function post()
    {
        return $this->belongsTo('App\Models\Pages',"post_id","id");
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User',"user_id","id");
    }

    public function comment(){
        return $this->belongsTo('App\Models\Comments',"comment_id","id");
    }

    /** 添加回复通知
     * @param $user_id
     * @param $post_id
     * @param $location
     * @param $comment_id
     * @return UserNotification
     */
    public function addUserNotification($user_id, $post_id, $location, $comment_id)
    {
        Log::info("插入数据");
        $userNotification = UserNotification::where("user_id",$user_id)->where("post_id",$post_id)
                                            ->where("location",$location)->where("comment_id",$comment_id)
                                            ->where("type",0)
                                            ->first();

        if(!$userNotification){
            $userNotification = new UserNotification();
        }

        $userNotification->user_id = $user_id;
        $userNotification->is_read = 0;
        $userNotification->post_id = $post_id;
        $userNotification->location = $location;
        $userNotification->comment_id = $comment_id;
        $userNotification->type = 0;
        $userNotification->save();

        return $userNotification;

    }

    /** 置为已读
     * @param $user_id
     * @return int
     */
    public function setReaded($user_id)
    {
        $userNotifications = UserNotification::where("user_id",$user_id)->where("is_read",0)->get();

        foreach($userNotifications as $userNotification){
            if($userNotification){
                $userNotification->is_read = 1;
                $userNotification->save();
                return 1;
            }else{
                return 0;
            }
        }
    }

    /** 保存话题通知
     * @param $user_id
     * @param $post_id
     */
    public function addStroeNotification($user_id, $post_id)
    {
        $userNotification = UserNotification::where("user_id",$user_id)->where("post_id",$post_id)
                                            ->where("type",1)
                                            ->first();

        if(!$userNotification){
            $userNotification = new UserNotification();
        }

        $userNotification->user_id = $user_id;
        $userNotification->post_id = $post_id;
        $userNotification->type= 1;

        if($userNotification->save()){
            return 1;
        }else{
            return 0;
        }

    }

}
