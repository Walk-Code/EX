<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseViewController extends BaseController
{
    public function verifyEmail()
    {
        view('auth.verifyEmail');
    }

    public function notAllowIpAccess(Request $request)
    {
        return view("error.notAllowIpAccess");
    }


}
