<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::get();
        $pages = Pages::get();
        foreach ($pages as $k=>$page) {
            $page->uuid = $users[$k]->uuid;
            $page->save();
        }

        return view("admin.dashboard");
    }
}
