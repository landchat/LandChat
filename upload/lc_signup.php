<?php require('./config.php');?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Landchat - 注册</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $webroot;?>/landchat.css"/>
    <script>
        function rvcallback() {
            document.getElementById("subm").removeAttribute("disabled");
        }
    </script>
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
</head>
<body>
<div id="login">
    <h1>注册LandChat</h1>
    <form action="signupa.php" method="get" autocomplete="off"><!--
        ID: <input type="text" required="required" placeholder="设置您的ID" name="u"></input>-->
        密码: <input type="text" required="required" placeholder="设置您的密码" name="pwd"></input><!--
        重复密码: <input type="password" required="required" placeholder="重复密码" name="pwd2"></input>-->
        昵称: <input type="text" required="required" placeholder="设置您的昵称" name="name"></input>
        Email: <input type="text" required="required" placeholder="设置您的邮箱" name="email"></input>
        头像URL: <input type="text" placeholder="输入您想设置的头像图片的URL，留空使用默认" name="picurl"></input>
        <button class="but" id="subm" type="submit" disabled="disabled">注册</button>
    </form><br/>
    <div class="h-captcha" data-sitekey="cbd3bac7-3f20-4108-a12c-69b52c0f2213" data-theme="dark" data-callback="rvcallback"></div>
    <hr/>
    <button class="but" id="logm" onclick="window.location.href='./web/login.html';">我要登录</button>
    <hr/>
    <button class="but" id="logm" onclick="window.location.href='./github/register.html';">Github第三方注册</button>
</div>
</body>
</html>