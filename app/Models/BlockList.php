<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlockList extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = "block_list";

    /** block 用户
     * @param array $data
     * @param int $type
     */
    public function blockUser(array $data, $type = 2)
    {
        $block = BlockList::where("type", $type)->where("user_id", $data["user_id"])
            ->where("attention_user_id", $data["attention_user_id"])
            ->first();

        if (!$block) {
            $block = new BlockList();
        }

        $block->type = $type;
        $block->ip_address = $data["ip_address"];
        $block->time = time();
        $block->user_id = $data["user_id"];
        $block->attention_user_id = $data["attention_user_id"];

        if ($block->save()) {
            return $block;
        } else {
            return 0;
        }

    }

    public function unBlockUser(array $data, $type = 2)
    {
        $block = BlockList::where("type", $type)->where("user_id", $data["user_id"])
            ->where("attention_user_id", $data["attention_user_id"])
            ->first();

        if ($block) {

            if ($block->delete()) {
                return 1;
            } else {
                return 0;
            }

        } else {
            return 0;
        }


    }


    /** block ip
     * @param array $data
     * @param int $type
     * @return BlockList|int
     */
    public function blockIp(array $data, $type = 1)
    {
        $block = BlockList::where("type", $type)->where("ip_address", $data["ip_address"])
            ->first();

        if (!$block) {
            $block = new BlockList();
        }

        $block->type = $type;
        $block->ip_address = $data["ip_address"];
        $block->time = time();

        $insertData = [];
        foreach (explode(",", $data["ip_address"]) as $item) {
            $insertData[] = [
                "type" => $type,
                "ip_address" => $item,
                "time" => time(),
                "created_at" => date("Y-m-d"),
                "updated_at" => date("Y-m-d H:i:s")
            ];
        }

        if (DB::Table("block_list")->insert($insertData)) {
            return 1;
        } else {
            return 0;
        }

    }

    public function isInBlickList($ip, $type = 1)
    {
        $ip = BlockList::where("type", $type)->where("ip_address", $ip)->distinct()->first();

        if ($ip) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getBlockListUUid($type = 2)
    {
        $uuid = [];

        if (Auth::user()) {
            $user_ids = BlockList::where("type", $type)->where("user_id", Auth::user()->id)->pluck("attention_user_id");

            foreach ($user_ids as $id) {

                if ($user = User::find($id)) {
                    $uuid [] = $user->uuid;
                }

            }

        }

        return $uuid;

    }


}
