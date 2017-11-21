<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\GuestBook\public/../application/home\view\index\showMyArticle.html";i:1510916140;s:62:"E:\GuestBook\public/../application/home\view\index\header.html";i:1510916023;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>我的留言</title>
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

<div style="margin: 0 auto;width:850px;">
    <table style="border-collapse: collapse;border: 1px solid #337ab7;word-break:break-all; word-wrap:break-all;" border="1">
        <tr style="text-align: center">
            <th style="width: 60px;">文章id</th>
            <th style="width: 80px;">用户名</th>
            <th style="width: 200px;">创建时间</th>
            <th style="width: 200px;">更新时间</th>
            <th style="width: 200px;padding: 20px;">留言内容</th>
            <th style="width: 90px;">操作</th>
        </tr>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$text): $mod = ($i % 2 );++$i;?>
        <tr style="text-align: center;" class="my_text">
            <td><?php echo $text['id']; ?></td>
            <td><?php echo $nickname; ?></td>
            <td><?php echo $text['create_time']; ?></td>
            <td><?php echo $text['update_time']; ?></td>
            <td style="text-align: left;"><?php echo $text['content']; ?></td>
            <td>
                <a style="color:#337ab7;text-decoration: none" href="/editMyArticle/<?php echo $text['id']; ?>">修改</a> <span style="color: black">|</span>
                <a style="color:#337ab7;text-decoration: none" href="/deleteMyArticle/<?php echo $text['id']; ?>">删除</a>
            </td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>