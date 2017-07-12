<?php

namespace App\Http\Controllers;

use App\Models\BlockList;
use App\Models\Comments;
use App\Models\Pages;
use App\Models\Stroe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //return Comments::where("post_id",151)->first()->page;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where("name",$id)->first();
        $pages = Pages::where("uuid",$user->uuid)->orderBy("created_at","desc")->limit(10)->get();
        $comments = Comments::where("uuid",$user->uuid)->orderBy("created_at","desc")->limit(10)->get();

        foreach($comments as $comment){
            $comment->firendTime = $this->timeElapsedString($comment->created_at);
        }

        foreach($pages as $page){
            $page->firendTime = $this->timeElapsedString($page->created_at);
        }

        return view('profile',["pages"=>$pages,"comments"=>$comments,"user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addWebSide(Request $request)
    {
        $user = User::where("name",$request->name)->first();

        if($user){
            $user->website = $request->website;

            if($user->save()){

                return redirect()->back()->with("success","添加成功");

            }else{

                return redirect()->back()->with("success","添加失败");

            }

        }else{

            return redirect()->back()->with("success","添加失败");

        }

    }

    public function block($name,Request $request)
    {
        $data = $request->all();
        $data["attention_user_id"] = User::where("name",$name)->first()->id;
        $data["user_id"] = Auth::user()->id;
        $data["ip_address"] = $request->getClientIp();
        $block = new BlockList();

        if($block->blockUser($data)){

            return redirect()->back()->with("success","添加成功");

        }else{

            return redirect()->back()->with("success","添加失败");

        }

    }

    public function unBlock($name,Request $request)
    {
        $data = $request->all();
        $data["attention_user_id"] = User::where("name",$name)->first()->id;
        $data["user_id"] = Auth::user()->id;
        $data["ip_address"] = $request->getClientIp();
        $block = new BlockList();

        if($block->unBlockUser($data)){

            return redirect()->back()->with("success","取消成功");

        }else{

            return redirect()->back()->with("fail","取消失败");

        }
    }

    public function attention($name,Request $request)
    {
        $data = $request->all();
        $data["ip_address"] = $request->getClientIp();
        $data["user_id"] = Auth::user()->id;
        $data["attention_user_id"] = User::where("name",$name)->first()->id;
        $store = new Stroe();

        if($store->store($data,1)){

            return redirect()->back()->with("success","关注成功");

        }else{

            return redirect()->back()->with("fail","关注失败");

        }
    }

    public function unattention($name,Request $request)
    {
        $data = $request->all();
        $data["ip_address"] = $request->getClientIp();
        $data["user_id"] = Auth::user()->id;
        $data["attention_user_id"] = User::where("name",$name)->first()->id;
        $store = new Stroe();

        if($store->unstore($data,1)){

            return redirect()->back()->with("success","取关成功");

        }else{

            return redirect()->back()->with("fail","取关失败");

        }
    }

}
