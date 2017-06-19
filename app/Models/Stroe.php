<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stroe extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User',"user_id","id");
    }

    public function topcic()
    {
        return $this->belongsTo('App\Models\Pages',"post_id","id");
    }

    public function store(array $data)
    {
        $store = Stroe::where("user_id",$data['user_id'])->where("post_id",$data['post_id'])
                      ->where("ip_address")
                      ->first();
        
        if(!$store){
            $store = new Stroe();
        }

        $store->user_id = $data['user_id'];
        $store->post_id = $data['post_id'];
        $store->ip_address = $data['ip_address'];

        if($store->save()){
            event();
            return $store;
        }else{
            return 0;
        }

        
    }





}
