<?php

namespace App\Listeners;

use App\Events\UserNotificationEvent;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Log;

class UserNotificationListener
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
     * @param  UserNotification  $event
     * @return void
     */
    public function handle(UserNotificationEvent $event)
    {
        Log::info("处理用户提醒事件");
        $user = $event->getUser();
        $post_id = $event->getPostId();
        $comment = $event->getCommentId();
        $location = $event->getLocation();

        $userNotification = new UserNotification();
        $userNotification->addUserNotification($user->id,$post_id,$location,$comment);
    }
}
