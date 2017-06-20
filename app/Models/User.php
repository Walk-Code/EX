<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findUserByName($name)
    {
        $user = User::where('name',$name)->first();

        if($user){
            return $user;
        }else{
            return 0;
        }
    }

    public function hasManyNotification()
    {
        return $this->hasMany('App\Models\UserNotification','user_id','id');
    }

    public function store()
    {
        return $this->hasMany('App\Models\Stroe',"user_id","id")->where("type",0);
    }

    public function isStore($user_id,$post_id)
    {
        $store = Stroe::where("user_id",$user_id)->where("post_id",$post_id)->first();

        if($store){
            return 1;
        }else{
            return 0;
        }
    }
    
}
