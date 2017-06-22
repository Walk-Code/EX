<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Pages;
use App\Models\Stroe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends BaseController
{

    public function index()
    {
        $pages = Pages::orderBy('updated_at','desc')->paginate(15);
        foreach($pages as $k=>$page){
            $pages[$k]['author'] = $page->user->name;
            $pages[$k]['image'] = $page->user->head_img;
        }
        unset($pages->user);
        //return $pages;
        return view('home',['pages'=>$pages]);
    }



    public function show(Request $request,$id)
    {
        $comments = Pages::find($id)->comments;
        return view('page',['page' => Pages::find($id),'comments'=>$comments,'path'=>$request->getPathInfo()]);
    }

    public function edit(Pages $pages)
    {
        //
    }


    public function update(Request $request, Pages $pages)
    {
        //
    }

    public function create()
    {
        return view('topic');
    }

    /**创建话题
     * @param Request $request
     */
    public function newT(Request $request)
    {
        $post = new Pages();
        if($post->create($request->all())){
            return redirect()->to("/")->with("success","创建成功");
        }else{
            return redirect()->to("/")->with("success","创建失败");
        }

    }
    
    /**回复某人
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function replyOne(Request $request)
    {
        $post_id = $request->post_id;
        $editor_type = $request->editor_type;
        $replyContent = $request->reply;
        $location = $request->location;


        $comment = new Comments();
        if($comment->addComment($replyContent,$post_id,Auth::user()->uuid,$location,new User())){
            return redirect("/t/".$post_id)->with("评论失败");

        }else{
            return redirect("/t/".$post_id)->withErrors("评论失败");
        }

    }


    //summernote upload img
    public function ajaxImageUpload(Request $request)
    {
        if($request->hasFile("file")){
            $image = $request->file("file");
            $output = $this->GzHttpPost($image->getClientOriginalName(),$image->getMimeType(),$image->getPathname());
            return $output;

        }else{
            return 0;
        }
    }

    /**收藏话题
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id, Request $request)
    {
        $stroe = new Stroe();
        $data = array("user_id"=>Auth::user()->id,"post_id"=>$id,"ip_address"=>$request->getClientIp());

        if($stroe->store($data)){
            return redirect()->back()->with("success","收藏成功");
        }else{
            return redirect()->back()->with("fail","操作失败");
        }
    }

    /**取消收藏
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unstore($id, Request $request)
    {
        $stroe = new Stroe();
        $data = array("user_id"=>Auth::user()->id,"post_id"=>$id,"id_address"=>$request->getClientIp());

        if($stroe->unstore($data)){
            return redirect()->back()->with("success","取消收藏成功");
        }else{
            return redirect()->back()->with("success","操作失败");
        }
        
    }
    
}
