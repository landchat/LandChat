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
        <div id="main">
            <div id="1">
                <h2>禁用用户</h2>
                <form action="<?php echo $webroot?>/opuser.php" method="post">
                ID: <input type="text" required="required" placeholder="输入您要禁用的用户ID" name="id"></input>
                操作: <input value="disable" type="text" required="required" name="op"></input>
                <button class="but" type="submit">操作</button>
                </form>
            </div>
            <div id="2">
                <h2>允许用户</h2>
                <form action="<?php echo $webroot?>/opuser.php" method="post">
                ID: <input type="text" required="required" placeholder="输入您要允许的用户ID" name="id"></input>
                操作: <input value="enable" type="text" required="required" name="op"></input>
                <button class="but" type="submit">操作</button>
                </form>
            </div>
            <div id="3">
                <h2>大赦</h2>
                <form action="<?php echo $webroot?>/opuser.php" method="post">
                操作: <input value="dashe" type="text" required="required" name="op"></input>
                <button class="but" type="submit">操作</button>
                </form>
            </div>
            <div id="4">
                <h2>全部禁言</h2>
                <form action="<?php echo $webroot?>/opuser.php" method="post">
                操作: <input value="disableall" type="text" required="required" name="op"></input>
                <button class="but" type="submit">操作</button>
                </form>
            </div>
            <div id="5">
                <h2>快速注册</h2>
                <form action="<?php echo $webroot?>/signupa.php" method="post">
                id: <input value="" type="text" required="required" name="id"></input>
                fromadmin: <input value="true" type="text" required="required" name="fromadmin"></input>
                <button class="but" type="submit">操作</button>
                </form>
            </div>
        </div>
    </body>
</html>