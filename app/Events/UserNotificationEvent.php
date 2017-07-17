<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class UserNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var 用户模型
     */
    protected $user;

    /**
     * @var 话题Id
     */
    protected $post_id;

    /**
     * @var 回复内容
     */
    protected $comment_id;

    /**
     * @var 回复的楼数
     */
    protected $location;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $post_id, $comment_id, $location)
    {
        //Log::info("触发用户提醒");
        $this->user = $user;
        $this->post_id = $post_id;
        $this->comment_id = $comment_id;
        $this->location = $location;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return 用户模型
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return 话题Id
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @return 回复内容
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }
}
