<?php
require("./../../config.php");
if ($_COOKIE['lc_uid'] != "23564" || $_COOKIE['lc_passw'] != "Ericnth080103") {
    header("Location: ".$webroot."/web/login.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LandChat管理面板</title>
    </head>
    <body>
        <h2>LandChat Admin</h2>
        <p><a href="javascript:void(0);" onclick="document.getElementById('ifr').contentWindow.location.href='./ifr.php';">回到管理首页</a></p>
        <iframe src="./ifr.php" id="ifr" width="90%" height=500></iframe>
    </body>
</html>