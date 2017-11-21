<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"E:\test\blog\public/../application/index\view\index\modify.html";i:1510915899;s:63:"E:\test\blog\public/../application/index\view\index\header.html";i:1511056821;s:63:"E:\test\blog\public/../application/index\view\Index\footer.html";i:1510924719;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>密码修改</title>
    <link rel='stylesheet' type='text/css' href='\static\WebStyle1.css'>
    <style>
        form span {
            color:red;
        }
        label {
            font-size:15px;
        }
        input {
            margin-top:8px;
            font-size:19px;
        }
        img {
            width:100px;
        }
    </style>
</head>

<body style='margin:0 auto;background-color: #f8f8f8;'>
<div class='header'>
    <h2 style="margin-top: 10px;">欢迎来到留言簿</h2>
</div>

<div style='text-align:center;height:785px;padding:10px;font-size:17px;'>

    <form accept-charset="UTF-8" action="/index/Modify/modify" method='post'>
        <h2>修改密码</h2>
        <fieldset style='width:260px;border-width:2px;padding:20px;margin:0px auto;'>
            <div style='width:260px;text-align:left;margin:0px auto;'>
                <label for='user_name'>用户名:</label>
                <input type='text' name='user_name' style='margin-bottom:15px;' value=""><span style='font-size:15px;'>*</span>
                <label for='oldPassword'>
                    正在使用的密码:
                </label>
                <input type='password' name='old_password' style='margin-bottom:15px;'><span style='font-size:15px;'>*</span>
                <label for='password1'>
                    请输入新密码:
                </label>
                <input type='password' name='password1' style='margin-bottom:15px;'><span style='font-size:15px;'>*</span>
                <label for='password2'>
                    再次输入新密码:
                </label>
                <input type='password' name='password2'><span style='font-size:15px;'>*</span>
            </div>
            <br/>
            <div style='text-align:center;'>
                <input type='submit' value='提交'>
            </div>
        </fieldset>
        <h3><a style='text-decoration:none;color:#0366d6;' href='/index'>立即登录</a></h3>
    </form>
</div>
<div class='footer'>
    <h3 style="margin-top: 12px;">Powered By Zewei Zhang</h3>
</div>
</body>
</html>