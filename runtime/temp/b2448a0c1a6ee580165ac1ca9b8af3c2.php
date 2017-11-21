<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"E:\test\blog\public/../application/home\view\index\editMyArticle.html";i:1510916109;s:62:"E:\test\blog\public/../application/home\view\index\header.html";i:1510916023;s:62:"E:\test\blog\public/../application/home\view\index\footer.html";i:1510924752;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>修改留言</title>
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
<div style='text-align:center;height:711px;'>
    <form accept-charset="UTF-8" action="/editMyArticle/<?php echo $mid; ?>" method='post'>
        <div style='width:550px;height:400px;padding:20px;text-align:center;margin:0 auto;border-bottom: 1px solid #eee;padding-bottom: 70px;'>
            <h3>请修改您的留言:</h3>
            <div style='width:750px;margin:0 auto;text-align:left;'>
                <label for='message'><span>*</span>留言少于1000字:</label>
                <textarea style='display:block;font-size:18px;' name='message' rows='15' cols='60'><?php echo $text; ?></textarea>
            </div></br>
            <input style='font-size:20px;' type='submit' value='提交'>
        </div>
    </form>
</div>
<div class='footer'>
    <h3 style="margin-top: 12px;">Powered By Zewei Zhang</h3>
</div>
</body>
</html>

