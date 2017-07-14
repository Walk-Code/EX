<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StoreNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var 用户模型
     */
    protected $user_id;

    /**
     * @var 关注人
     */
    protected $attention_user_id;

    /**
     * @var 类型 1：回复通知 2：收藏通知 3：关注通知
     */
    protected $type;

    /**
     * @var 话题id
     */
    protected $post_id;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $post_id = 0, $attention_user_id = 0)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->attention_user_id = $attention_user_id;
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
     * @return mixed
     */
    public function getAttentionUserId()
    {
        return $this->attention_user_id;
    }

    /**
     * @return 类型
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @return 用户模型
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
