<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"E:\test\blog\public/../application/index\view\index\Register.html";i:1511102390;s:63:"E:\test\blog\public/../application/index\view\index\header.html";i:1511056821;s:63:"E:\test\blog\public/../application/index\view\Index\footer.html";i:1510924719;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>注册页面</title>
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

    <h2>免费注册</h2><br/>
    <form accept-charset="UTF-8" action="register/register" method='post'>
        <table style='margin:0 auto;border-width:0px;border-collapse: collapse;' border='1' cellpadding='5px;' >
            <tr>
                <td style="text-align: right;"><span>*</span>用户名:</td><td style="text-align: left;" colspan='3'><input type='text' name='user_name' value=''></td>
            </tr>
            <tr>
                <td style="text-align: right;">
                    <span>*</span>密码:
                </td>
                <td style="text-align: left;" colspan='3'>
                    <input type='password' name='password'><span>(密码长度不能小于8)</span>
                </td>
            </tr>
            <tr>
                <td style="text-align: right;"><span>*</span>昵称:</td><td style="text-align: left;"><input type='text' name='nickname' value=''></td><td>QQ号:</td><td><input type='text' name='qq' value=''></td>
            </tr>
            <tr>
                <td style="text-align: right;">电子邮件:</td><td style="text-align: left;"><input type='text' name='email' value=''></td><td style="text-align: right;">来自:</td><td><input type='text' name='hometown' value=''></td>
            </tr>
            <tr>
                <td style="text-align: right;"><span>*</span>个性签名:</td><td><textarea style='font-size:17px;' name='signature' rows='6' cols='25'></textarea></td>
                <td style="text-align: right;">头像:</td>
                <td>
                    <input type='radio' id="male" name='img_id' value="1">
                    <label for="male"><img src="/static/1.jpg"/></label>
                    <input type='radio' id="female" name='img_id' value="2">
                    <label for="female"><img src="/static/2.jpg"/> </label>
                </td>
            </tr>
            <tr>
                <td style='font-size:0px;padding:2px;' colspan='4'>&nbsp;</td>
            </tr>
            <tr>
                <td colspan='4'><input style='float:none;' type='submit' value='注册'></td>
            </tr>
        </table>
    </form>
    <h3><a style='text-decoration:none;color:#0366d6;' href='/index'>立即登录</a></h3>
</div>
<div class='footer'>
    <h3 style="margin-top: 12px;">Powered By Zewei Zhang</h3>
</div>
</body>
</html>