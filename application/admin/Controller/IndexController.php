<?php

namespace app\admin\Controller;
use app\home\model\Message;
use think\Controller;
use app\index\model\User;
use think\Request;

class IndexController extends Controller {
    //检查是否非法访问
    private function checkAccess() {
        if(\think\Session::get('is_admin')==null){
            $this->error("您无权访问接下来的页面!","/index","",2);
        }
    }
    public function index(){

        return "您无权访问哦~~";
    }
    //管理员退出
    public function admin_logout() {
        session('uid',null);
        session('is_admin',null);
        $this->success("退出成功!","/index","",1);

        return "gg";
    }
    //添加用户
    public function admin_user_add(Request $request) {
        $this->checkAccess();
        if($request->isPost()){
            $data=$request->param();
            $user=new User();

            if(User::getByUserName($data['user_name'])){
                $this->error("用户名已被使用!","/admin_user_add","",2);
            }else{
                if($user->allowField(true)->validate(true)->save($data)){
                    $user=User::getByUserName($data['user_name']);
                    $user->uid = $user->id + 10000;
                    $user->allowField(true)->save();
                    $this->success("用户添加成功!","/admin_user_add","",1);
                }else{
                        $this->error("添加失败:".$user->getError(),"/admin_user_add","",2);
                }
            }
        }

        return $this->fetch("user_add");
    }
    //改变用户
    public function admin_user_change($mode = 0, $uid = -1) {
        $this->checkAccess();
        if($mode!=0){
            $user=User::getByUid($uid);
        }
        if($mode==1){
            if($user->allowField(true)->save(['is_admin'=>1])){
                $this->success("成功设置其为管理员!","/admin_user_change","",1);
            }
        }elseif($mode==2){
            if($user->delete()){
                $this->success("删除成功!","/admin_user_change","",1);
            }else{
                $this->error("删除失败!","/admin_user_change","",2);
            }
        }

        $all_user = User::all();

        $this->assign('all_user',$all_user);
        return $this->fetch("user_change");
    }
    //删除留言
    public function admin_message_delete($mid = -1) {
        $this->checkAccess();
        if($mid!=-1){
            if(Message::getById($mid)->delete()){
                \think\Db::execute("delete from blog_comment WHERE message_id = ? ",[$mid]);
                $this->success("删除成功!","/admin_message_delete","",1);
            }else{
                $this->error("删除失败!","/admin_message_delete","",2);
            }
        }

        $user = User::all();
        $message = \app\home\model\Message::all(function($query){$query->order('create_time');});
        $this->assign("text",$message);
        $this->assign("user",$user);
        return $this->fetch("message_delete");
    }
    //留言置顶
    public function admin_message_top($mode = 0, $mid = -1) {
        $this->checkAccess();
        if($mode!=0){
            $message=Message::getById($mid);
            if($mode==1){
                if($message->save(['is_top'=>1]))
                    $this->success("置顶成功!","/admin_message_top","",1);
            }else{
                if($message->save(['is_top'=>0]))
                    $this->success("取消置顶成功!","/admin_message_top","",1);
            }
        }

        $user = User::all();
        $message = \app\home\model\Message::all(function($query){$query->order('create_time');});

        $this->assign("text",$message);
        $this->assign("user",$user);

        return $this->fetch("message_top");
    }
    //留言屏蔽
    public function admin_message_hide($mode = 0, $mid = -1) {
        $this->checkAccess();
        if($mode!=0){
            $message=Message::getById($mid);
            if($mode==1){
                if($message->save(['is_show'=>0]))
                    $this->success("屏蔽成功!","/admin_message_hide","",1);
            }else{
                if($message->save(['is_show'=>1]))
                    $this->success("取消屏蔽成功!","/admin_message_hide","",1);
            }
        }

        $user = User::all();
        $message = \app\home\model\Message::all(function($query){$query->order('create_time');});

        $this->assign("text",$message);
        $this->assign("user",$user);

        return $this->fetch("message_hide");
    }
}
