<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/13
 * Time: 22:29
 */
namespace app\home\model;
use think\Model;

class Message extends Model {

    protected $connection=[
        //自动写入时间戳
        'auto_timestamp'  => true,
    ];
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    protected $type=['create_time'=>'timestamp','update_time'=>'timestamp'];
    protected $dateFormat='Y-m-d H:i:s';

    //添加留言
    public static function addData($uid) {
        $data = input("post.");
        session('text',$data['message']);

        if(strlen($data['message'])>1000 || strlen($data['message'])<10){
            return false;
        }

        $mess = Message::create([
            'author'=>$uid,
            'content'=>$data['message'],
            'praise'=>0,
            'hate'=>0]);
        if($mess)
            return true;
        else
            return false;
    }

    //修改留言
    public static function editData($id) {
        $mess = Message::get($id);
        $data = input("post.");

        if(strlen($data['message'])>1000 || strlen($data['message'])<10){
            return false;
        }

        $mess->content = $data['message'];
        if($mess->save()){
            return true;
        }else{
            return false;
        }
    }

}















