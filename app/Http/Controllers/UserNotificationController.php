<?php

namespace App\Http\Controllers;

use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends BaseController
{
    public function index()
    {
        $userNotifications = Auth::user()->hasManyNotification;
        return view('notifications',['userNotifications',$userNotifications]);
    }
}
