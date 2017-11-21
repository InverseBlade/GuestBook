<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"E:\test\blog\public/../application/admin\view\index\index.html";i:1510838259;s:63:"E:\test\blog\public/../application/admin\view\index\header.html";i:1510844528;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>后台管理</title>
    <link rel='stylesheet' type='text/css' href='/static/WebStyle.css'>
    <style>
        form span {
            color:red;
        }
        td {
            padding:5px;
            padding-left:15px;
            padding-right:15px;
            text-align:left;
        }
        td li {
            float:left;
            font-size:13px;
            width:190px;
        }
        td ul {
            margin:0;
            padding:0;
            list-style-type:none;
            display:inline-block;
        }
    </style>
</head>

<body style='margin:0 auto;text-align: center;'>
<div class='header'>
    <h1>留言簿后台管理系统</h1>
</div>

<div class='guide' style="text-align:left;height:66px;background: #bebebe;">
    <ul>
        <li>
            <div style="text-align:center;width: 200px;height:56px;background: #34495E;color: white;font-size:35px;padding-top: 10px;">Admin</div>
        </li>
        <li>
            <a class="guide_row" href="/admin">管理用户</a>
        </li>
        <li>
            <a class="guide_row" href="/admin_message_delete">管理留言</a>
        </li>
        <li>
            <a class="guide_row" href="/    ">退出</a>
        </li>
    </ul>
</div>
<div class="nav">
    <ul>
        <li>
            <a class="guide" href="/    ">添加用户</a>
        </li>
        <li>
            <a class="guide" href="/    ">更改用户</a>
        </li>
        <li>
            <a class="guide" href="/    ">前台首页</a>
        </li>
    </ul>
</div>

<div>
    <table style="font-size:18px;border-collapse: collapse;border: 1px solid #337ab7;word-break:break-all; word-wrap:break-all;" border="1">
        <tr style="text-align: center">
            <th style="width: 5%;">id</th>
            <th style="width: 6%;">网站id</th>
            <th style="width: 9%;">用户名</th>
            <th style="width: 11%;">用户昵称</th>
            <th style="width: 14%;">创建时间</th>
            <th style="width: 15%;">电子邮件</th>
            <th style="width: 8%;">QQ号</th>
            <th style="width: 10%;">来自</th>
            <th style="width: 15%;">签名</th>
            <th style="width: 9%;">操作</th>
        </tr>
        <?php if(is_array($all_user) || $all_user instanceof \think\Collection || $all_user instanceof \think\Paginator): $i = 0; $__LIST__ = $all_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
        <tr style="text-align: center;" class="my_text">
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['uid']; ?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['nickname']; ?></td>
            <td><?php echo $user['create_time']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['qq']; ?></td>
            <td><?php echo $user['hometown']; ?></td>
            <td><?php echo $user['signature']; ?></td>
            <td style="text-align: center;">
                <!--<a style="color:#337ab7;text-decoration: none" href="/">标记为管理员</a> <span style="color: black">|</span>-->
                <a style="color:#337ab7;text-decoration: none" href="/">删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>

</body>
</html>