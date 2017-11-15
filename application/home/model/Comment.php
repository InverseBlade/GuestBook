<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/14
 * Time: 21:18
 */
namespace app\home\model;
use app\index\model\User;
use think\Model;

class Comment extends Model {
    protected $connection=[
        //自动写入时间戳
        'auto_timestamp'  => true,
    ];
    protected $createTime = 'create_time';

    protected $type=['create_time'=>'timestamp'];
    protected $dateFormat='Y-m-d H:i:s';

    public static function addData($uid,$mid,$content){
        $user=User::getByUid($uid);
        $com = new Comment();
        $data = ['p_nickname'=>$user->nickname,'author_id'=>$uid,'message_id'=>$mid,'content'=>$content];

        if($content!=""){
            if($com->allowField(true)->save($data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function getAllData() {
        return Comment::all(function($query){$query->where('is_show','=',1)->order('create_time');});
    }

    public function getIntervalAttr($value, $data){
        $interval = (time()-$data['create_time'])/60;
        if($interval<1){
            return "刚刚";
        }elseif ($interval<10){
            return substr($interval,0,1)."分钟前";
        }elseif ($interval<60){
            return substr($interval,0,2)."分钟前";
        }

        $interval/=60;
        if ($interval<10){
            return substr($interval,0,1)."小时前";
        }elseif ($interval<24){
            return substr($interval,0,2)."小时前";
        }

        $interval/=24;
        if ($interval<10){
            return substr($interval,0,1)."天前";
        }elseif ($interval<100){
            return substr($interval,0,2)."天前";
        }elseif ($interval<365){
            return substr($interval,0,3)."天前";
        }

        $interval/=365;
        if ($interval<10){
            return substr($interval,0,1)."年前";
        }
        //感觉好蠢....
    }
}