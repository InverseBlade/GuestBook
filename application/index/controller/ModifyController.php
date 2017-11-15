<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/12
 * Time: 20:01
 */
namespace app\index\controller;
use think\Request;
use app\index\model\User;
use think\Controller;
use think\Validate;

class ModifyController extends Controller {
    public function Modify(Request $request) {
        if($request->isPost()){
            $user=User::getByUserName($request->param('user_name'));
            if($user){
                if(md5($request->param('old_password'))==$user->password){
                    if($request->param('password1')==$request->param('password2')){
                        if(strlen($request->param('password1'))>=8){
                            $user->password=$request->param('password1');
                            $user->allowField(true)->save();
                            unset($request);
                            $this->success("修改成功! 正在跳转至登录页面...","/index","",1);
                        }else{
                            $this->error("密码过短!","/index/Modify/modify","",2);
                        }
                    }else{
                        $this->error("两次密码输入不一致!","/index/Modify/modify","",2);
                    }
                }else{
                    $this->error("当前使用密码错误!","/index/Modify/modify","",2);
                }
            }else{
                $this->error("用户名不存在!","/index/Modify/modify","",2);
            }
        }

        return $this->fetch("index/modify");
    }
}