<?php

namespace App\Listeners;

use App\Events\StoreNotificationEvent;
use App\Models\UserNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreNotificationListener
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
     * @param  StoreNotificationEvent  $event
     * @return void
     */
    public function handle(StoreNotificationEvent $event)
    {
        $uesr = $event->getUserId();
        $post_id = $event->getPostId();

        $userNotifity = new UserNotification();
        $userNotifity->addStroeNotification($uesr,$post_id);
    }

}
