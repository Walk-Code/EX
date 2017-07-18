<?php

namespace App\Models;

use Jieba;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pages extends Model
{
    protected $table = "posts";

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'uuid', 'uuid');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments', 'post_id', 'id');
    }

    public function store()
    {
        return $this->hasMany('App\Models\Stroe', "post_id", 'id');
    }


    public function create(array $data)
    {
        $post = Pages::where("title", $data['title'])->first();

        if (!$post) {
            $post = new Pages();
        }

        $post->title = $data['title'];

        if (isset($data['reply'])) {
            //md
            $post->content = Markdown::convertToHtml($data['reply']);
        } else {
            $post->content = htmlspecialchars($data['content']);
        }

        $post->uuid = Auth::user()->uuid;
        $post->times = time();

        if ($post->save()) {
            return $post;
        } else {
            return 0;
        }

    }


}
