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
                $user=User::getByUserName($request->param('UserName'));
                $uid=$user->uid;
                session('is_admin',null);
                session('uid',$uid);
                if($user->is_admin==1){
                    session('is_admin',$uid);
                    $this->redirect("/admin_user_change");
                }else{
                    $this->success('登录成功!','/home/',"",1);
                }
                unset($request);
            }else{
                $this->error('用户名或密码错误!','/',"",2);
            }
        }
    }

}
