<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/11/13
 * Time: 14:27
 */
namespace app\home\Controller;
use think\Controller;
use app\index\model\User;
use app\home\model\Message;
use app\home\model\Comment;
use think\Session;
use think\Request;

class IndexController extends Controller {
    //个人主页面
    public function index() {
        if(($uid=Session::get('uid'))===null){
            $this->error("错误错误错误！！！","/index/");
        }
        $user=User::getByUid($uid);
        $this->assign('user',$user);
        if(Session::get('text')!=null){
            $this->assign('text',Session::get('text'));
        }else{
            Session::set("text",null);
            $this->assign('text',"");
        }
        return $this->fetch();
    }
    //添加个人留言
    public function addMyArticle() {
        if(Message::addData(Session::get('uid'))==true){
            Session::set("text",null);
            $this->success("添加成功!","/home","",1);
        }else{
            $this->error("添加失败,可能字数过多或过少!","/home","",2);
        }
    }
    //显示自己的所有留言
    public function showMyArticle() {
        $uid = Session::get('uid');
        $list = Message::all(
            function($query)use($uid){
                $query->where('author',$uid)->order('id');
            });
        $nickname = User::getByUid($uid)->nickname;

        $this->assign('nickname',$nickname);
        $this->assign('list',$list);
        return $this->fetch();
    }
    //修改留言
    public function editMyArticle(Request $request,$id) {
        if($request->isPost()){
            if($text=Message::get($id)->save(["content"=>$request->param('message')])){
                $this->success("修改成功!","/showMyArticle","",1);
            }else{
                $this->error("删除失败:".$text->getError(),"/showMyArticle","",2);
            }
        }
        $data = Message::get($id)->content;
        $this->assign('text',$data);
        $this->assign('mid',$id);
        return $this->fetch();
    }
    //删除留言
    public function deleteMyArticle($id) {
        if($text=Message::get($id)->delete()){
            \think\Db::execute("delete from blog_comment WHERE message_id = ? ",[$id]);
            $this->success("删除成功!","/showMyArticle","",1);
        }else{
            $this->error("删除失败:".$text->getError(),"/showMyArticle","",2);
        }

    }
    //留言展示
    public function forum() {
        $comment = Comment::getAllData();
        $user = User::all();
        $message = Message::all(function($query){$query->where('is_show','<>',0)->order('create_time','desc');});

        $this->assign("text",$message);
        $this->assign("user",$user);
        $this->assign("comment",$comment);
        return $this->fetch();
    }
    //添加评论
    public function addComment(Request $request,$mid) {
        if($request->isPost()){
            if(Comment::addData(Session::get('uid'),$mid,$request->param('comment'))){
                $this->success("评论成功!","/forum","",1);
            }else{
                $this->error("评论失败","/forum","",2);
            }
        }else{
            redirect("/forum");
        }
    }
    //用户退出登录
    public function logout(){
        Session::clear();
        $this->success("退出成功!","/index","",1);
    }
}
