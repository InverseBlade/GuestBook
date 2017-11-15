<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/12
 * Time: 17:43
 */
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\User;
use think\Session;

class LoginController extends Controller{
    public function login(Request $request){
        Session::set('text',null);
        if($request->isPost()){
            if(User::login($request->param('UserName'),$request->param('Password'))){
                $uid=User::getByUserName($request->param('UserName'))->uid;
                session('uid',null);
                session('uid',$uid);
                $this->success('登录成功!','/home/',"",1);
                unset($request);
            }else{
                $this->error('用户名或密码错误!','/',"",2);
            }
        }
    }

}
