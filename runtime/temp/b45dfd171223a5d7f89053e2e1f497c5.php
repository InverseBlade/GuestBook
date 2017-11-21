<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"E:\服务端新人test\MyBlog\public/../application/index\view\index\register.html";i:1510482745;s:75:"E:\服务端新人test\MyBlog\public/../application/index\view\Index\footer.html";i:1510476086;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel='stylesheet' type='text/css' href='static/WebStyle1.css'>
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
    </style>
</head>

<body style='margin:0 auto;'>
<div class='header'>
    <h1>Welcome to GuestBook</h1>
</div>

<div style='text-align:center;height:762px;padding:10px;font-size:17px;'>
    <h2>Sign up to GuestBook</h2><br/>
    <form accept-charset="UTF-8" action="Register/register" method='post'>
        <table style='margin:0 auto;border-width:0px;' border='1' cellspacing='0' cellpadding='5px;'>
            <tr>
                <td><span>*</span>Username:</td><td colspan='3'><input type='text' name='UserName' value=''></td>
            </tr>
            <tr><td><span>*</span>Password:</td><td colspan='3'><input type='password' name='Password'></td></tr>
            <tr>
                <td><span>*</span>Name:</td><td><input type='text' name='Name' value=''></td><td>QQ:</td><td><input type='text' name='QQ' value=''></td>
            </tr>
            <tr>
                <td>Email:</td><td><input type='text' name='Email' value=''></td><td>From:</td><td><input type='text' name='Hometown' value=''></td>
            </tr>
            <tr>
                <td><span>*</span>Signature:</td><td><textarea style='font-size:17px;' name='Signature' rows='6' cols='25'></textarea></td><td>Head img:</td><td><input type='radio' name='Himg' checked><input type='radio' name='Himg'></td>
            </tr>
            <tr>
                <td style='font-size:0px;padding:2' colspan='4'>&nbsp;</td>
            </tr>
            <tr>
                <td colspan='4'><input style='float:none;' type='submit' value='Sign up'></td>
            </tr>
        </table>
    </form>
    <h3><a style='text-decoration:none;color:#0366d6;' href='/index'>Click me to sign in</a></h3>
</div>
<div class='footer'>
    <h3>Powered By Zewei Zhang</h3>
</div>
</body>
</html>