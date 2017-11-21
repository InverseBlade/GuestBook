<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/12
 * Time: 16:45
 */
namespace app\index\model;
use app\home\model\Message;
use think\Model;

Class User extends Model {
    protected $connection=[
        //自动写入时间戳
        'auto_timestamp'  => true,
    ];
    protected $createTime = 'create_time';

    protected $type=['create_time'=>'timestamp',];
    protected $dateFormat='Y-m-d H:i:s';
    //登录判断
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
    //加密密码
    protected function setPasswordAttr($value){
        return md5($value);
    }
    //删除用户以及她的所有发言和评论
    public static function deleteUser($uid) {
        $mid = \think\Db::name('message')->where('author',"=",$uid)->column('id');
        if(User::getByUid($uid)->delete()){
            Message::deleteData($mid);
            \think\Db::name('comment')->where('author_id',$uid)->delete();
            return true;
        }else{
            return false;
        }
    }
}