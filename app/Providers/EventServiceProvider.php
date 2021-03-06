<?php

namespace App\Providers;

use App\Listeners\UserVerifiedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
        ],
        'App\Events\LoginEvent' => [
            'App\Listeners\LoginListener',
        ],
       /* 'Jrean\UserVerification\Events\UserVerified' => [
            'App\Listeners\UserVerifiedListener'
        ],*/
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],
        'App\Events\UserNotificationEvent' => [
            'App\Listeners\UserNotificationListener'
        ],
        'App\Events\StoreNotificationEvent' => [
            'App\Listeners\StoreNotificationListener'
        ]

    ];
    //为订阅者注册监听器
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    public function register()
    {
        $this->app->bind(UserVerifiedListener::class, function () {
            return new UserVerifiedListener(
                $this->app->make('auth')
            );
        });
    }
    
}
