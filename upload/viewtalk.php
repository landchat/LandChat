<?php
require('./config.php');
$roomid = $_GET['id'];
$path = './talkdata/'.$roomid.'.txt';
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
if($_REQUEST["auth"] == "cookie") {
    //echo "(cookie)";
    $usrid = $_COOKIE["lc_uid"];
    $usrpwd = $_COOKIE["lc_passw"];
} else {
    $usrid = $_REQUEST["id"];
    $usrpwd = $_REQUEST["pwd"];
}
$sql = "SELECT * FROM lc_users WHERE id=".$usrid;
$result = $conn->query($sql);
if ($result->num_rows != 1) {
    echo "Login Error (01)";
    $conn->close();
    exit;
}
$row = $result->fetch_assoc();
if ($usrpwd == $row['pwd']) {
    ;
} else {
    echo "认证失败";
    $conn->close();
    exit;
}

if (!file_exists($path)) {
    echo '您还没有Talk!';
} else {
    $handle = fopen($path, 'r');
    $content = fread($handle, filesize($path));
    fclose($handle);
    $content=str_replace("\r\n","<br/>",$content);
    $content=str_replace(" ","&nbsp;",$content);
    echo "<!DOCTYPE html><html><body><h2>以下是您收到的Talk! : </h2><p>";
    echo $content;
    echo "<br/></p><a href='$webroot/web/picupload.html'>返回</a></body></html>";
}