<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"E:\test\blog\public/../application/home\view\index\forum.html";i:1511058482;s:62:"E:\test\blog\public/../application/home\view\index\header.html";i:1510916023;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>留言广场</title>
    <link rel='stylesheet' type='text/css' href='\static\WebStyle.css'>
    <style>
        form span {
            color:red;
        }

        .my_text td {
            padding-top: 20px;
            padding-bottom: 50px;
        }
    </style>
</head>

<body style='margin:0 auto;background-color: #f8f8f8;'>
<div class='header'>
    <h2 style="margin-top: 10px;">欢迎来到留言簿test项目</h2>
</div>

<div class='guide'>
    <ul>
        <li>
            <a class="guide" href="/home">写留言</a>
        </li>
        <li>
            <a class="guide" href="/showMyArticle">我的留言</a>
        </li>
        <li>
            <a class="guide" href="/forum">留言展示</a>
        </li>
        <li>
            <a class="guide" href="/logout">退出登录</a>
        </li>
    </ul>
</div>
<div style='text-align:center;'>
    <table border='1' style='margin:0 auto;border-collapse: collapse;border: 1px solid #337ab7;' cellspacing="0" class="forum">
        <?php if(is_array($text) || $text instanceof \think\Collection || $text instanceof \think\Paginator): $i = 0; $__LIST__ = $text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;if($row['is_top'] == '1'): if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;if($r['uid'] == $row['author']): $author = $r; endif; endforeach; endif; else: echo "" ;endif; ?>

                <tr>
                    <td rowspan="4" valign="center" style="line-height: 25px;width: 187px;height: 178px;">
                        <img src="static/<?php echo $author['img_id']; ?>.jpg" style="margin-left:40px;width: 100px;"/><br/>
                        <?php echo $author['nickname']; ?><br/>来自: <?php echo $author['hometown']; ?>
                    </td>
                    <td>
                        发表于: <?php echo $row['create_time']; ?><span style="margin-left: 100px;">&nbsp;</span>
                        最后更新于: <?php echo $row['update_time']; ?>
                        <span style="color:blue;margin-left: 20px;">置顶</span>
                        <span style="color:red;margin-left: 3px;">精华</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="text-align:left;padding-left: 50px;width: 645px;height: 117px;"><?php echo $row['content']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li style="float:left;">Email: <?php echo $author['email']; ?></li>
                            <li style='float:left;'>QQ: <?php echo $author['qq']; ?></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;">
                        评论: <br/>
                        <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_row): $mod = ($i % 2 );++$i;if($c_row['message_id'] == $row['id']): ?>
                        <span style="width: 100px;"><?php echo $c_row['p_nickname']; ?>: </span>
                        <span style="width: 300px;"><?php echo $c_row['content']; ?></span>
                        <span style="width: 200px;color: #cccccc;">回复于<?php echo $c_row['interval']; ?></span>
                        <br/>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <form accept-charset="UTF-8" action="/addComment/<?php echo $row['id']; ?>" method="post">
                            <input style='width:400px;' type='text' name='comment'>
                            <input style='margin-left:10px;' type='submit' value='评论'>
                        </form>
                    </td>
                </tr>
            <?php endif; endforeach; endif; else: echo "" ;endif; if(is_array($text) || $text instanceof \think\Collection || $text instanceof \think\Paginator): $i = 0; $__LIST__ = $text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;if($row['is_top'] == '0'): if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;if($r['uid'] == $row['author']): $author = $r; endif; endforeach; endif; else: echo "" ;endif; ?>

            <tr>
                <td rowspan="4" valign="center" style="line-height: 25px;width: 187px;height: 178px;">
                    <img src="static/<?php echo $author['img_id']; ?>.jpg" style="margin-left:40px;width: 100px;"/><br/>
                    <?php echo $author['nickname']; ?><br/>来自: <?php echo $author['hometown']; ?>
                </td>
                <td>
                    发表于: <?php echo $row['create_time']; ?><span style="margin-left: 100px;">&nbsp;</span>
                    最后更新于: <?php echo $row['update_time']; ?>
                </td>
            </tr>
            <tr>
                <td valign="top" style="text-align:left;padding-left: 50px;width: 645px;height: 117px;"><?php echo $row['content']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li style="float:left;">Email: <?php echo $author['email']; ?></li>
                        <li style='float:left;'>QQ: <?php echo $author['qq']; ?></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    评论: <br/>
                    <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_row): $mod = ($i % 2 );++$i;if($c_row['message_id'] == $row['id']): ?>
                            <span style="width: 100px;"><?php echo $c_row['p_nickname']; ?>: </span>
                            <span style="width: 300px;"><?php echo $c_row['content']; ?></span>
                            <span style="width: 200px;color: #cccccc;">回复于<?php echo $c_row['interval']; ?></span>
                            <br/>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <form accept-charset="UTF-8" action="/addComment/<?php echo $row['id']; ?>" method="post">
                        <input style='width:400px;' type='text' name='comment'>
                        <input style='margin-left:10px;' type='submit' value='评论'>
                    </form>
                </td>
            </tr>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>