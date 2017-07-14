<?php
/**
 * Created by PhpStorm.
 * User: jianqi
 * Date: 2017/6/6
 * Time: 9:29
 */

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{

    protected function formatValidationErrors(Validator $validator)
    {

    }

    public function __construct()
    {

    }

    /**
     * @param $url
     * @param $params
     * @param $type 1：file 2:order
     * @return mixed
     */
    public static function httpPost($url, $params)
    {
        $postData = "";

        foreach ($params as $k => $param) {
            $postData .= $k . "=" . $param . "&";
        }

        $postData = rtrim($postData, "&");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;

    }

    public static function httpGet($url, $params)
    {

    }

    public function GzHttpPost($fileName, $fileMime, $filePath)
    {
        $client = new Client();

        $response = $client->request("post", "https://sm.ms/api/upload", [
            'multipart' => [
                [
                    'name' => 'smfile',
                    'filename' => $fileName,
                    'Mime-Type' => $fileMime,
                    'contents' => fopen($filePath, 'r'),
                ],

            ]
        ]);

        $data = $response->getBody();
        return json_decode($data, true)['data']['url'];

    }

    /**
     *
     * User model
     */
    public function userNotify()
    {
        /*  if($user = Auth::user()){
              return view("layouts.right",['']);
          }*/
    }

    public function timeElapsedString($datetime, $full = false)
    {
        $now = new \DateTime();
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => '年',
            'm' => '月',
            'w' => '周',
            'd' => '天',
            'h' => '小时',
            'i' => '分钟',
            's' => '秒',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v;//. ($diff->$k > 1 ? 's' : '')
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);

        return $string ? implode(', ', $string) . ' 前' : '剛剛';

    }

}