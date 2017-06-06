<?php

namespace App\Http\Controllers;

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



    public function show($id)
    {
        return view('page',['page' => Pages::find($id)]);
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
        Log::info("get all data");
        if($request->hasFile("file")){
            $image = $request->file("file");
            Log::info($image);
            $files['smfile'] = "@".$image;
            $output = $this->httpPost("https://sm.ms/api/upload",$files);
            return $output;

        }else{
            return 123;
        }
    }


}
