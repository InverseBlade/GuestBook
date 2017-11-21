<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\∑˛ŒÒ∂À–¬»Àtest\MyBlog\public/../application/index\view\Index\index.html";i:1510480173;s:75:"E:\∑˛ŒÒ∂À–¬»Àtest\MyBlog\public/../application/index\view\Index\header.html";i:1510482550;s:75:"E:\∑˛ŒÒ∂À–¬»Àtest\MyBlog\public/../application/index\view\Index\footer.html";i:1510476086;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login in</title>
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
    <h2>Sign in to GuestBook</h2><br/>
    <form accept-charset="UTF-8" action="/index/Login/login" method='post'>
        <fieldset style='width:250px;border-width:2px;padding:20px;margin:0px auto;text-align: center;'>
            <div style='width:252px;text-align:left;margin:0px auto;'>
                <label for='UserName'>Username:</label>
                <input type='text' name='UserName' style='margin-bottom:15px;' value=""><span style='font-size:15px;'>*</span>
                <label for='Password'>
                    Password:
                    <a style='color:blue;font-size:10px;margin-left:67px;text-decoration:none;' href='./changePassword.php'>Change password</a>
                </label>
                <input type='password' name='Password'><span style='font-size:15px;'>*</span>
            </div>
            <br/>
            <div style='text-align:center;'>
                <input type='submit' value='Sign in'>
            </div>
        </fieldset>
        <h3><a style='text-decoration:none;color:#0366d6;' href='index/Register/register'>Click me to sign up</a></h3>
    </form>
    <div style="margin:0 auto;width:250px;text-align: left">
        <h4><?php echo url('Index/index/index'); ?></h4>
        Ê≥®ÂÜå‰ø°ÊÅØ:<br/>
        <p>Áî®Êà∑Âêç: </p>
        <p>  ÂØÜÁ†Å: </p>
    </div>
</div>
<div class='footer'>
    <h3>Powered By Zewei Zhang</h3>
</div>
</body>
</html>
