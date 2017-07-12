<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOperation extends Model
{
    protected $table = "user_operation";

    public function addorUpdate(array $data,$id = 0)
    {
        if($id){

            $userOperation = UserOperation::find($id);

        }else{
            $userOperation = UserOperation::where("ip_address",$data['ip_address'])
                                          ->where("user_id",$data['user_id'])
                                          ->where("times",$data["times"])
                                          ->where("position",$data["position"])
                                          ->first();
            if(!$userOperation){
                $userOperation = new UserOperation();
            }

        }

        $userOperation->ip_address = $data["ip_address"];
        $userOperation->user_id = $data["user_id"];
        $userOperation->times = $data["times"];
        $userOperation->position = $data["position"];

        if($userOperation->save()){
            return $userOperation;
        }else{
            return 0;
        }

    }
    
}
