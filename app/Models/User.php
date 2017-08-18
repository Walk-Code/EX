<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends AuthUser implements Authenticatable
{
    use Notifiable;

    /** geetest
     * @var array
     */
    protected $guarded = ['geetest_challenge', 'geetest_validate', 'geetest_seccode'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'uuid', 'head_img'
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
        $user = User::where('name', $name)->first();

        if ($user) {

            return $user;

        } else {

            return 0;

        }
    }

    public function hasManyNotification()
    {
        return $this->hasMany('App\Models\UserNotification', 'user_id', 'id');
    }

    public function storeTopic()
    {
        return $this->hasMany('App\Models\Stroe', "user_id", "id")->where("type", 0);
    }

    public function storeUser()
    {
        return $this->hasMany('App\Models\Stroe', "user_id", "id")->where("type", 1);
    }

    public function isStore($user_id, $post_id)
    {
        $store = Stroe::where("user_id", $user_id)->where("post_id", $post_id)->first();

        if ($store) {

            return 1;

        } else {

            return 0;

        }
    }

    public function isAttention($user_id, $attention_user_id)
    {
        $store = Stroe::where("user_id", $user_id)->where("attention_user_id", $attention_user_id)->first();

        if ($store) {

            return 1;

        } else {

            return 0;

        }

    }


    public function isBlock($user_id, $attention_user_id)
    {
        $store = BlockList::where("user_id", $user_id)->where("attention_user_id", $attention_user_id)->first();

        if ($store) {

            return 1;

        } else {

            return 0;

        }
    }


    public function pages()
    {
        return $this->hasMany('App\Models\Pages', "uuid", "uuid");
    }

}
