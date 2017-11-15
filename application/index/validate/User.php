<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/12
 * Time: 19:23
 */
namespace app\index\validate;
use think\Validate;

class User extends Validate {

    protected $rule = [
        'user_name|用户名' => ['require','min'=>4],
        'password|密码'  => ['require','min'=>8],
        'nickname|昵称'  => ['require','min'=>1],
        'email|电子邮件'     => ['email'],
        'qq|QQ号码'        => ['min'=>6],
        'signature|个人签名' => ['require','min'=>5,'max'=>50]
    ];
}