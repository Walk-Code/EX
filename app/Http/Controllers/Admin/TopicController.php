<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pages;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
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
        $currentTopicCount = Pages::whereBetween("created_at", [date("Y-m-d") . " 00:00:00", date("Y-m-d") . " 23:59:59"])->count();


        if ($request->has('key') && !$request->has('timer')) {

            $key = $request->key;
            $Pages = Pages::whereHas("user", function ($q) use ($key) {
                $q->where("name", "like", "%" . $key . "%");
            })->orWhere("title", "like", "%" . $key . "%")->orderBy("created_at", "desc")->paginate(30);

        } elseif (!$request->has("key") && $request->has("timer")) {

            $timer = $request->timer;

            $Pages = Pages::whereBetween("created_at", [explode(" - ", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                ->paginate(30);

        } elseif ($request->has(["key", "timer"])) {

            $key = $request->key;
            $timer = $request->timer;
            $Pages = Pages::whereHas("user", function ($q) use ($key) {
                $q->where("name", "like", "%" . $key . "%");
            })->whereBetween("created_at", [explode(" - ", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                ->Where("title", "like", "%" . $key . "%")
                ->paginate(30);
        } else {

            $Pages = Pages::orderBy("created_at", "desc")->paginate(30);

        }

        return view("admin.topic.index", ["pages" => $Pages, "key" => $key, "timer" => $timer, "count" => "共找到" . $Pages->total() . "条", "currentDateTopic" => $currentTopicCount]);

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
}
