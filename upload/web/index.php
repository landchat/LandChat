<?php require('./../config.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/><!--<meta http-equiv="Expires" content="0"><meta http-equiv="Pragma" content="no-cache"><meta http-equiv="Cache-control" content="no-cache"><meta http-equiv="Cache" content="no-cache"><meta name="theme-color" content="#17a6a2">-->
        <title>LandChat Online</title>
        <link rel="shortcut icon" href="<?php echo $webroot;?>/landchat_64.jpg" type="image/x-icon">
        <script type="text/javascript" src="./landchat.js"></script>
        <script async="async" src="./sweetalert.min.js" type="text/javascript"></script>
        <script async="async" src="./showdown.min.js" type="text/javascript"></script>
        <script src="./jquery.min.js" type="text/javascript"></script>
        <script>function launchfunc() {<?php
                if (empty($_REQUEST['theme'])) {
                    //echo "window.location.href='".$webroot."/web/?theme=blue';";
                    echo "startchangetheme();";
                } else {
                    echo "startstoretheme(\"".$_REQUEST['theme']."\");";
                }
                ?>if(getCookie("lc_debug")==""){window.location.href="login.php";}}$(document).ready(function(){$("#editprofilebtn").click(function(){$("#editprofile").slideToggle("slow");});});document.oncontextmenu=function(e){window.location.replace('./picupload.html');return false;}</script>
        <link rel="stylesheet" type="text/css" href="<?php echo $webroot;?>/web/<?php echo $_REQUEST['theme']?>/lc_style.css?ver=<?php echo mt_rand(1000,9999);?>">
        <script type="text/javascript" src="<?php echo $webroot;?>/web/<?php echo $_REQUEST['theme']?>/lc_actions.js?ver=<?php echo mt_rand(1000,9999);?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $webroot;?>/web/obj_locate.css">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>
    <body id="lc_main" onload="onload();">
        <script>launchfunc();</script><div class="zw"id="zw"><p style="font-weight:600;font-size:22px">LandChat 2021</p><p id="yourid">您的UID: Unknown</p><p>当前聊天室: <p id="prvcr">LandChat</p></p><br/><input id="ccr"type="text"placeholder="更改聊天室"maxlength="64"></input><input id="crb"type="submit"value="确定"onclick="changeroom();"></input><br/><br/><div id="editprofilebtn"href="javascript:void(0);">编辑个人信息</div><div id="editprofile"style="display:none;"><br/><input id="cnc"type="text"placeholder="更改昵称"maxlength="64"required="required"></input><input id="cncs"type="submit"value="确定"onclick="changenc();"></input><br/><input id="c3"type="text"placeholder="更改密码"maxlength="64"required="required"></input><input id="c32"type="submit"value="确定"onclick="change3();"></input><br/><input id="c4"type="text"placeholder="更改头像链接"maxlength="1024"required="required"></input><input id="c42"type="submit"value="确定"onclick="change4();"></input><br/><br/></div><p><small>Web Client Version:2021.0.1<br/>由23564制作</small><br/><small id="lctimer"></small></p><p style="font-size:14px"><a id="downdat"href="./../chatdata/roomLandChat.html"style="color:#000;"download="LandChat_data.htm">下载聊天记录</a>&nbsp;&nbsp;<a href="./login.php"style="color:#000;">重新登录</a></p><br/><!--left_bottom1--><div><ins class="adsbygoogle"style="display:block"data-ad-client="ca-pub-5638230382721511"data-ad-slot="4394488118"data-ad-format="auto"data-full-width-responsive="true"></ins></div><script>(adsbygoogle=window.adsbygoogle||[]).push({});</script></div><div class="msgbox"id="msgbox">Loading...</div><div class="sendbox"id="sendbox"><input id="ibox"type="text"placeholder="输入消息，支持Markdown"onkeypress="oninputkeypressed();"maxlength=500></input><input id="msend"type="button"value="发送"onclick="sendmsg();"></input>&nbsp;&nbsp;<input id="psend"type="button"value="更多功能"onclick="window.location.href='./picupload.html';"></input><small><p id="rspbox"></p></small></div><script>onstartup();flushtime();startchangeroom();</script>
	</body>
</html>