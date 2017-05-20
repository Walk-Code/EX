<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
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


}
