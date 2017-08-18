<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlockList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IpController extends Controller
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

        $currentIpCount = BlockList::whereBetween("created_at", [date("Y-m-d") . " 00:00:00", date("Y-m-d") . " 23:59:59"])->count();

        if ($request->has('key') && !$request->has('timer')) {

            $key = $request->key;
            $BlockLists = BlockList::where("ip_address", "like", "%" . $key . "%")->orderBy("created_at", "desc")->paginate(30);

        } elseif (!$request->has("key") && $request->has("timer")) {

            $timer = $request->timer;

            $BlockLists = BlockList::whereBetween("created_at", [explode(" - ", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                ->paginate(30);

        } elseif ($request->has(["key", "timer"])) {

            $key = $request->key;
            $timer = $request->timer;
            $BlockLists = BlockList::whereBetween("created_at", [explode(" - ", $timer)[0] . " 00:00:00", explode(" - ", $timer)[1] . " 23:59:59"])
                                    ->where("ip_address", "like", "%" . $key . "%")
                                    ->paginate(30);
        } else {

            $BlockLists = BlockList::orderBy("created_at", "desc")->paginate(30);

        }

        return view("admin.ip.index", ["blockLists" => $BlockLists, "key" => $key, "timer" => $timer, "count" => "共找到" . $BlockLists->total() . "条", "currentIpCount" => $currentIpCount]);


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
        $blockList = new BlockList();

        if ($blockList->blockIp(Input::all())) {

            return redirect("/admin/ip")->with(["success" => "添加成功"]);

        } else {

            return redirect("/admin/ip")->with(["fail" => "添加失败"]);

        }
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
        $ip = BlockList::find($id);

        if ($ip->delete()) {

            return redirect("/admin/ip")->with(["success" => "删除成功"]);

        } else {

            return redirect("/admin/ip")->with(["success" => "删除失败"]);

        }

    }
}
