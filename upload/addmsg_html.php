<?php
require('./config.php');
date_default_timezone_set('PRC');
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$usrid = $_GET["id"];
$usrpwd = $_GET["pwd"];
//$usrname=$_GET['usr'];
$roomid = $_GET['room'];
$msg = $_GET['msg'];
$appid = $_GET['app_id'];
$path = './chatdata/room'.$roomid.'.txt';
$app = getappname($appid);

if (strpos($msg,'草') || strpos($msg,'fuck') || strpos($msg,'cao') || strpos($msg,'淦') || strpos($msg,'金珂拉') || strpos($msg,'傻逼') || strpos($msg,'鸡巴') || strpos($msg,'妈的') || strpos($msg,'nm') || strpos($msg,'尼玛') || strpos($msg,'操你妈') || strpos($msg,'阴茎') || strpos($msg,'睾丸') || strpos($msg,'月经') || strpos($msg,'屌') || strpos($msg,'艹')) {
    echo "含有不当字符，不予发送！";
    $conn->close();
    exit;
} 

//clearstatcache();
//echo substr(sprintf('%o',fileperms($fele)), -3)." ";

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
if ($row['status'] == -1) {
    echo "Access denied (03)";
    $conn->close();
    exit;
}


$msg = str_replace("---plus---", "+", $msg);

$sql = "SELECT * FROM `lc_msg`";
$result = $conn->query($sql);

$sql = "INSERT INTO `lc_msg` (`msgid`, `usrid`, `msg`, `time`, `client`, `type`, `room`, `filename`) VALUES ('".$result->num_rows."', '$usrid', '$msg', '".date('Y-m-d H:i:s', time())."', '$app', '0', '$roomid', '')";
$result = $conn->query($sql);
echo 'Succeed';
$conn->close();