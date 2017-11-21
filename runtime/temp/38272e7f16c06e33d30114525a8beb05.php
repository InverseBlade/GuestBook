<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"E:\test\blog\public/../application/admin\view\index\user_add.html";i:1510928200;s:63:"E:\test\blog\public/../application/admin\view\index\header.html";i:1510929451;}*/ ?>
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
            <a class="guide" href="/admin_user_add">添加用户</a>
        </li>
        <li>
            <a class="guide" href="/admin_user_change">更改用户</a>
        </li>
        <li>
            <a class="guide" href="/home">前台首页</a>
        </li>
    </ul>
</div>

<div style="text-align: left;">
    <form accept-charset="UTF-8" action="/admin_user_add" method='post'>
        <table style='border-width:0px;border-collapse: collapse;' border='1' cellpadding='5px;' >
            <tr>
                <td style="text-align: right;"><span>*</span>用户名:</td><td style="text-align: left;" colspan='3'><input type='text' name='user_name' value=''></td>
            </tr>
            <tr>
                <td style="text-align: right;"><span>*</span>密码:</td><td style="text-align: left;" colspan='3'><input type='password' name='password'></td>
            </tr>
            <tr>
                <td style="text-align: right;"><span>*</span>昵称:</td><td><input type='text' name='nickname' value=''></td><td>QQ号:</td><td><input type='text' name='qq' value=''></td>
            </tr>
            <tr>
                <td style="text-align: right;">电子邮件:</td><td><input type='text' name='email' value=''></td><td style="text-align: right;">来自:</td><td><input type='text' name='hometown' value=''></td>
            </tr>
            <tr>
                <td style="text-align: right;"><span>*</span>个性签名:</td><td><textarea style='font-size:17px;' name='signature' rows='6' cols='25'></textarea></td><td style="text-align: right;">头像:</td><td><input type='radio' name='h_img' checked><input type='radio' name='h_img'></td>
            </tr>
            <tr>
                <td style='text-align:right;'>
                    管理员:
                </td>
                <td style="text-align: left;" colspan="3">
                    否<input type="radio" name="is_admin" value="0" checked>
                    是<input type="radio" name="is_admin" value="1">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan='4'><input style='float:none;' type='submit' value='添加'></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>