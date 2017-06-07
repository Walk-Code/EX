<?php
/**
 * Created by PhpStorm.
 * User: jianqi
 * Date: 2017/6/6
 * Time: 9:29
 */

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{

    /**
     * @param $url
     * @param $params
     * @param $type 1：file 2:order
     * @return mixed
     */
    public static function httpPost($url, $params)
    {
        $postData = "";

        foreach($params as $k=>$param){
            $postData .= $k."=".$param."&";
        }

        $postData = rtrim($postData,"&");

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postData);

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;

    }

    public static function httpGet($url,$params)
    {

    }

    public function GzHttpPost($fileName,$fileMime,$filePath)
    {
        $client = new Client();

        $response = $client->request("post","https://sm.ms/api/upload",[
            'multipart' =>[
                [
                    'name' => 'smfile',
                    'filename' => $fileName,
                    'Mime-Type' => $fileMime,
                    'contents' => fopen($filePath,'r'),
                ],

            ]
        ]);

        $data = $response->getBody();
        return json_decode($data,true)['data']['url'];

    }
    
}