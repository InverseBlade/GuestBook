<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"E:\test\blog\public/../application/index\view\Index\index.html";i:1510915899;s:63:"E:\test\blog\public/../application/index\view\index\header.html";i:1511056821;s:63:"E:\test\blog\public/../application/index\view\Index\footer.html";i:1510924719;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>登录界面</title>
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

    <h2>登录</h2><br/>
    <form accept-charset="UTF-8" action="/index/Login/login" method='post'>
        <fieldset style='width:250px;border-width:2px;padding:20px;margin:0px auto;text-align: center;'>
            <div style='width:252px;text-align:left;margin:0px auto;'>
                <label for='UserName'>用户名:</label>
                <input type='text' name='UserName' style='margin-bottom:15px;' value=""><span style='font-size:15px;'>*</span>
                <label for='Password'>
                    密码:
                    <a style='color:blue;font-size:10px;margin-left:150px;text-decoration:none;' href='/index/Modify/modify'>更改密码</a>
                </label>
                <input type='password' name='Password'><span style='font-size:15px;'>*</span>
            </div>
            <br/>
            <div style='text-align:center;'>
                <input type='submit' value='登录'>
            </div>
        </fieldset>
        <h3><a style='text-decoration:none;color:#0366d6;' href='/index/Register/register'>立即注册</a></h3>
    </form>
</div>
<div class='footer'>
    <h3 style="margin-top: 12px;">Powered By Zewei Zhang</h3>
</div>
</body>
</html>
