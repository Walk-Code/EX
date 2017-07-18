<?php

namespace App\Http\Controllers;

use App\Models\BlockList;
use App\Models\Comments;
use App\Models\Pages;
use App\Models\Stroe;
use App\Models\User;
use App\Models\UserOperation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Jieba;

class PagesController extends BaseController
{

    public function index()
    {
        $bluckList = new BlockList();
        $bluckListUUid = $bluckList->getBlockListUUid();

        $pages = Pages::whereNotIn('uuid', $bluckListUUid)->orderBy('updated_at', 'desc')->paginate(15);
        foreach ($pages as $k => $page) {
            $pages[$k]['author'] = $page->user->name;
            $pages[$k]['image'] = $page->user->head_img;
            $pages[$k]['friendTime'] = " · " . (empty($page->comments->last()) ? "" : $this->timeElapsedString($page->comments->last()->created_at));
        }
        unset($pages->user);
        //return $pages;

        return view('home', ['pages' => $pages]);
    }


    public function show(Request $request, $id)
    {
        $openation = new UserOperation();
        $jieba = new Jieba();

        $data = Input::all();
        $data["position"] = $request->getRequestUri() == "::1" ? "183.31.30.40" : $request->getRequestUri();//兼容本地测试
        $data["ip_address"] = $request->getClientIp();
        $data["times"] = time();
        $data['user_id'] = Auth::guard()->check() ? Auth::user()->id : 0;
        $openation->addorUpdate($data);

        $page = Pages::find($id);
        $comments = $page->comments;
        $page->firendTime = $this->timeElapsedString($page->created_at);

        $tags = $jieba->jiebaAnalyse()->extractTags($page->title, 10);


        foreach ($comments as $comment) {
            $comment->firendTime = $this->timeElapsedString($comment->created_at);
        }

        return view('page', ['page' => $page, 'comments' => $comments, "tages" => $tags]);

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
        if ($post->create(Input::all())) {
            return redirect()->to("/")->with("success", "创建成功");
        } else {
            return redirect()->to("/")->with("success", "创建失败");
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
        $replyContent = Input::get("reply");
        $location = $request->location;


        $comment = new Comments();
        if ($comment->addComment($replyContent, $post_id, Auth::user()->uuid, $location, new User())) {
            return redirect("/t/" . $post_id)->with("评论失败");

        } else {
            return redirect("/t/" . $post_id)->withErrors("评论失败");
        }

    }


    //summernote upload img
    public function ajaxImageUpload(Request $request)
    {
        if ($request->hasFile("file")) {
            $image = $request->file("file");
            $output = $this->GzHttpPost($image->getClientOriginalName(), $image->getMimeType(), $image->getPathname());
            return $output;

        } else {
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
        $data = array("user_id" => Auth::user()->id, "post_id" => $id, "ip_address" => $request->getClientIp());

        if ($stroe->store($data)) {
            return redirect()->back()->with("success", "收藏成功");
        } else {
            return redirect()->back()->with("fail", "操作失败");
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
        $data = array("user_id" => Auth::user()->id, "post_id" => $id, "id_address" => $request->getClientIp());

        if ($stroe->unstore($data)) {
            return redirect()->back()->with("success", "取消收藏成功");
        } else {
            return redirect()->back()->with("success", "操作失败");
        }

    }

}
