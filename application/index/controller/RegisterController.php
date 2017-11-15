<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/12
 * Time: 17:38
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\User;

class RegisterController extends Controller {
    public function register(Request $request) {
        $data=$request->param();
        $user=new User();

        if($request->isPost()){
            if(User::getByUserName($data['user_name'])){
                $this->error("用户名已被使用!","/index/Register/register","",2);
            }else{
                if($user->allowField(true)->validate(true)->save($data)){
                    $user=User::getByUserName($data['user_name']);
                    $user->uid = $user->id + 10000;
                    $user->allowField(true)->save();
                    $this->success("用户注册成功!","/index","",1);
                }else{
                    $this->error("注册失败:".$user->getError(),"/index/Register/register","",2);
                }
            }
        }

        return $this->fetch('index/Register');
    }
}