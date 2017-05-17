<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = "posts";

    public function user()
    {
        return $this->belongsTo('App\Models\User','uuid','uuid');
    }

}
