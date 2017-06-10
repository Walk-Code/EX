<?php

namespace App\Http\Controllers;

use App\Events\OrderShipped;
use App\Events\UserNotificationEvent;
use App\Models\Comments;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        foreach($comments as $comment){
            $comment->name = $comment->user->name;
            unset($comment->user);
        }

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

    public function replyOne(Request $request)
    {
        //dd($request);
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


}
