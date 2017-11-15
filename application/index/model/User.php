<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/12
 * Time: 16:45
 */
namespace app\index\model;
use think\Model;

Class User extends Model {
    protected $connection=[
        //自动写入时间戳
        'auto_timestamp'  => true,
    ];
    protected $createTime = 'create_time';

    protected $type=['create_time'=>'timestamp',];
    protected $dateFormat='Y-m-d H:i:s';

    public static function login($name, $password){
        $user = new User();

        if($user=User::getByUserName($name)){
            if($user->password==md5($password)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    protected function setPasswordAttr($value){
        return md5($value);
    }

}