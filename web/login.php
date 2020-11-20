<?php require("./../config.php");?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Landchat - 登录</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $webroot;?>/landchat.css"/>
</head>
<body>
<div id="login">
    <h1>登录LandChat</h1>
    <form action="login_result.php" method="post">
        ID: <input type="text" required="required" placeholder="输入您的用户ID" name="usr"></input>
        密码: <input type="password" required="required" placeholder="输入您的账户密码" name="pwd"></input>
        <button class="but" type="submit">登录</button>
    </form>
    <hr/>
        <button class="but" onclick="window.location.href='./../lc_signup.php'">我要注册</button>
</div>
</body>
</html>