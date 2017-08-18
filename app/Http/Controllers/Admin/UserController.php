<?php

namespace App\Http\Controllers\Admin;

use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = "";
        $timer = "";

        if ($request->has('key') && !$request->has('timer')) {

            $key = $request->key;
            $users = User::where("name", "like", "%" . $key . "%")->orderBy("created_at", "desc")->paginate(30);

        } elseif (!$request->has("key") && $request->has("timer")) {

            $timer = $request->timer;

            $users = User::whereBetween("created_at", [explode(" - ", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                         ->paginate(30);

        } elseif ($request->has(["key", "timer"])) {

            $key = $request->key;
            $timer = $request->timer;
            $users = User::whereBetween("created_at", [explode(" - ", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                         ->where("name", "like", "%" . $key . "%")
                         ->paginate(30);

        } else {

            $users = User::orderBy("created_at", "desc")->paginate(30);

        }

        return view("admin.user.index", ["users" => $users, "key" => $key, "timer" => $timer, "count" => "共找到" . $users->total() . "条", "verifyMail" => User::where("verified", 0)->count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function watch(Request $request, $name)
    {
        $timer = "";
        if ($request->has("timer")) {

            $timer = $request->timer;
            $loginLogs = LoginLog::where("user_id", User::where("name", rawurldecode($name))->pluck("id")[0])
                                 ->whereBetween("created_at", [explode(" -", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                                 ->paginate(30);

        } else {

            $loginLogs = LoginLog::where("user_id", User::where("name", $name)->pluck("id")[0])->paginate(30);

        }

        return view("admin.user.loginLog", ["loginLogs" => $loginLogs, "count" => "共查到" . $loginLogs->total() . "条记录", "name" => $name, "timer" => $timer]);

    }

}
