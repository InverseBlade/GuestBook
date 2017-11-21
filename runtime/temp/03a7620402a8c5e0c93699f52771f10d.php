<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"E:\test\blog\public/../application/admin\view\index\message_delete.html";i:1510846895;s:63:"E:\test\blog\public/../application/admin\view\index\header.html";i:1510929451;}*/ ?>
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

<body style='margin:0 auto;text-align: center;background-color: #f8f8f8;'>
<div class='header'>
    <h2 style="margin-top: 10px;">留言簿后台管理系统</h2>
</div>

<div class='guide' style="text-align:left;height:66px;background: #bebebe;">
    <ul>
        <li>
            <div style="text-align:center;width: 200px;height:56px;background: #34495E;color: white;font-size:35px;padding-top: 10px;">Admin</div>
        </li>
        <li>
            <a class="guide_row" href="/admin_user_change">管理用户</a>
        </li>
        <li>
            <a class="guide_row" href="/admin_message_delete">管理留言</a>
        </li>
        <li>
            <a class="guide_row" href="/admin_logout">退出</a>
        </li>
    </ul>
</div>
<div class="nav">
    <ul>
        <li>
            <a class="guide" href="/admin_message_top">置顶留言</a>
        </li>
        <li>
            <a class="guide" href="/admin_message_delete">删除留言</a>
        </li>
        <li>
            <a class="guide" href="/admin_message_hide">屏蔽留言</a>
        </li>
        <li>
            <a class="guide" href="/home">前台首页</a>
        </li>
    </ul>
</div>

<div>
    <table style="font-size:18px;border-collapse: collapse;border: 1px solid #337ab7;word-break:break-all; word-wrap:break-all;" border="1">
        <tr style="text-align: center">
            <th style="width: 7%;">aid</th>
            <th style="width: 20%;">留言内容</th>
            <th style="width: 15%;">作者用户名</th>
            <th style="width: 12%;">作者昵称</th>
            <th style="width: 5%;">显示</th>
            <th style="width: 5%;">置顶</th>
            <th style="width: 15%;">创建时间</th>
            <th style="width: 15%;">操作</th>
        </tr>

        <?php if(is_array($text) || $text instanceof \think\Collection || $text instanceof \think\Paginator): $i = 0; $__LIST__ = $text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;if($r['uid'] == $row['author']): $author = $r; endif; endforeach; endif; else: echo "" ;endif; ?>

            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['content']; ?>
                </td>
                <td>
                    <?php echo $author['user_name']; ?>
                </td>
                <td>
                    <?php echo $author['nickname']; ?>
                </td>
                <td style="text-align: center;">
                    <?php if($row['is_show'] == '1'): ?>
                        ✔
                    <?php else: ?>
                        ✘
                    <?php endif; ?>
                </td>
                <td style="text-align: center;">
                    <?php if($row['is_top'] == '1'): ?>
                    ✔
                    <?php else: ?>
                    ✘
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $row['create_time']; ?>
                </td>
                <td style="text-align: center;">
                    <a style="color:#337ab7;text-decoration: none" href="/admin_message_delete/<?php echo $row['id']; ?>">删除</a>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>

</body>
</html>














