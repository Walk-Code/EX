<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;
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
