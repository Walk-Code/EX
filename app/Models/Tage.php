<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tage extends Model
{
    protected $table = "tags";

    protected $fillable = [
      "post_id","key_word","times"
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Pages', "tag_id", "id");
    }

    public function create(array $data)
    {
        $tag = Tage::where("post_id", $data['post_id'])->first();

        if (!$tag) {

            $tag = new Tage();

        }

        $tag->post_id = $data['post_id'];
        $tag->key_word = serialize($data['key_word']);
        $tag->times = time();

        if ($tag->save()) {

            return 1;

        } else {

            return 0;

        }

    }
}
