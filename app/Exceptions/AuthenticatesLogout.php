<?php
/**
 * Created by PhpStorm.
 * User: jianqi
 * Date: 2017/6/29
 * Time: 17:38
 */

namespace App\Exceptions;


use Illuminate\Http\Request;

trait AuthenticatesLogout
{
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget($this->guard()->getName());
        $request->session()->regenerate();
        return redirect("/");

    }
}