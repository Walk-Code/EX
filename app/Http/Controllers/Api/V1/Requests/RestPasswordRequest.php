<?php
/**
 * Created by PhpStorm.
 * User: jianqi
 * Date: 2017/10/6
 * Time: 15:32
 */

namespace App\Http\Controllers\Api\V1\Requests;


use Dingo\Api\Http\FormRequest;
use Config;

class RestPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Config::get('boilerplate.rest_password.validation_rule');
    }

    public function messages()
    {
        return [
            'token.required' => 'token不存在',
            'email.required' => '邮箱不存在',
            'email.email' => '邮箱格式不正确',
            'password.required' => '密码必填',
            'password.confirmed' => '两次密码不一致'
        ];
    }
}