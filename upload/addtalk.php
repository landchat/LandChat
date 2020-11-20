<?php
require('./config.php');
date_default_timezone_set('PRC');
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
//$usrname=$_GET['usr'];
$to = $_REQUEST['to'];
$msg = $_REQUEST['msg'];
$path = './talkdata/'.$to.'.txt';
if (/*empty($to) || */empty($usrid) || empty($usrpwd)) {
    echo "Talk发送失败";
    exit;
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
    echo "Login Error (02)";
    $conn->close();
    exit;
}

$msg = str_replace("%26", "&", $msg);
$msg = str_replace("---plus---", "+", $msg);
$msg = str_replace("---jih---", "#", $msg);

if (!file_exists($path)) {
    $handle = fopen($path, 'w+');
    fwrite($handle, $row['name'].' '.date('Y-m-d H:i', time())."\r\n".$msg);
    fclose($handle);
    echo "<!DOCTYPE html><html><head><meta http-equiv='refresh' content='0.5;url=$webroot/web/picupload.html'></head><body>Talk发送成功！</body></html>";
} else {
    $handle = fopen($path, 'r');
    $content = fread($handle, filesize($path));
    $content = $row['name'].' '.date('Y-m-d H:i', time())."\r\n".$msg . "\r\n\r\n".$content;
    fclose($handle);
    $handle = fopen($path, 'w');
    fwrite($handle, $content);
    fclose($handle);
    echo "<!DOCTYPE html><html><head><meta http-equiv='refresh' content='0.5;url=$webroot/web/picupload.html'></head><body>Talk发送成功！</body></html>";
}
$conn->close();