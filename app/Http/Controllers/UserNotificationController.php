<?php

namespace App\Http\Controllers;

use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends BaseController
{
    public function index()
    {
        $userNotification = new UserNotification();
        $userNotification->setReaded(Auth::user()->id);
        $userNotifications = Auth::user()->hasManyNotification()->paginate(30);

        foreach ($userNotifications as $userNotification) {

            $userNotification->friendTime = $this->timeElapsedString($userNotification->created_at);

        }

        return view('notifications', ['userNotifications' => $userNotifications]);
    }
}
