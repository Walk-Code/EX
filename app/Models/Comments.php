<?php

namespace App\Models;

use App\Events\UserNotificationEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Comments extends Model
{
    public $table = "comments";

    public $fillable = [
        'id', 'comment', 'post_id', 'uuid'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'uuid', 'uuid');
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Pages', "post_id", 'id');
    }


    public function addComment($comments, $post_id, $uuid, $location = 0, User $user)
    {
        preg_match_all('/@\S*/', $comments, $usernameArr);
        $comment = new Comments();
        $comment->comment = $comments;
        $comment->post_id = $post_id;
        $comment->uuid = $uuid;
        $comment->times = time();
        $comment->save();

        //Log::info($comment);
        if ($comment) {
            foreach ($usernameArr[0] as $username) {
                if ($userModel = $user->findUserByName(trim(substr($username, 1)))) {
                    //Log::info("触发用户提醒");
                    event(new UserNotificationEvent($userModel, $post_id, $comment->id, $location));
                } else {
                    //TODO 收集消息发送失败记录
                }
            }
            return $comment;
        } else {
            return 0;
        }

    }

}
