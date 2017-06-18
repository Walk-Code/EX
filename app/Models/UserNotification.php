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

    public function addUserNotification($user_id,$post_id,$location,$comment_id)
    {
        Log::info("插入数据");
        $userNotification = UserNotification::where("user_id",$user_id)->where("post_id",$post_id)
                                            ->where("location",$location)->where("comment_id",$comment_id)
                                            ->first();

        if(!$userNotification){
            $userNotification = new UserNotification();
        }

        $userNotification->user_id = $user_id;
        $userNotification->is_read = 0;
        $userNotification->post_id = $post_id;
        $userNotification->location = $location;
        $userNotification->comment_id = $comment_id;
        $userNotification->save();

        return $userNotification;

    }

    public function setReaded($userNotificationId)
    {
        $userNotification = UserNotification::find($userNotificationId);

        if($userNotification){
            $userNotification->is_read = 1;
            $userNotification->save();
            return 1;
        }else{
            return 0;
        }
    }


}
