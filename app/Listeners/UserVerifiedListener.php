<?php

namespace App\Listeners;


use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Jrean\UserVerification\Events\UserVerified;

class UserVerifiedListener
{
    private $auth;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AuthManager $authManager)
    {
        $this->auth = $authManager;
    }

    /**
     * Handle the event.
     *
     * @param  UserVerified  $event
     * @return void
     */
    public function handle(UserVerified $event)
    {
        Log::info(json_encode($event));
        //$this->auth->guard()->login($event->user);
        Auth::guard()->login($event->user);
    }
}
