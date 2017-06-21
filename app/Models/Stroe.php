<?php

namespace App\Models;

use App\Events\StoreNotificationEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Stroe extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "stores";

    public function user()
    {
        return $this->belongsTo('App\Models\User',"user_id","id");
    }

    public function topcic()
    {
        return $this->belongsTo('App\Models\Pages',"post_id","id");
    }

    public function store(array $data,$type = 0)
    {
        $store = Stroe::where("user_id",$data['user_id'])->where("post_id",$data['post_id'])
                      ->first();
        
        if(!$store){
            $store = new Stroe();
        }

        $store->user_id = $data['user_id'];
        $store->ip_address = $data['ip_address'];
        $store->type = $type;

        if($type == 1){
            $store->attention_user_id = $data['attention_user_id'];
        }else{
            $store->post_id = $data['post_id'];
        }

        if($store->save()){
            event(new StoreNotificationEvent($data['user_id'],$data['post_id']));
            return $store;
        }else{
            return 0;
        }
        
    }


    public function unstore(array $data)
    {
        $store = Stroe::where("user_id",$data['user_id'])->where("post_id",$data['post_id'])
                      ->first();

        if($store){
            return $store->delete();
        }else{
            return 0;
        }

    }
    
    



}
