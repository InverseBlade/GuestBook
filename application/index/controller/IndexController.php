<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\User;

class IndexController extends Controller
{
    public function index()
    {
        if(($uid=Session::get("uid"))!=null) {
            $name = User::getByUid($uid)->nickname;
            $this->success("亲爱的{$name}，欢迎回来!", "/home", "", 1);
            return "";
        }
        return $this->fetch('Index/index');
    }
}
