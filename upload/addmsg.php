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

if (strpos($msg,'我爱') || strpos($msg,'love') || strpos($msg,'99') || strpos($msg,'草') || strpos($msg,'fuck') || strpos($msg,'死') || strpos($msg,'那没事了') || strpos($msg,'cao') || strpos($msg,'淦') || strpos($msg,'金珂拉') || strpos($msg,'傻逼') || strpos($msg,'cao') || strpos($msg,'鸡巴') || strpos($msg,'妈的') || strpos($msg,'nm') || strpos($msg,'尼玛') || strpos($msg,'操你妈') || strpos($msg,'阴茎') || strpos($msg,'睾丸') || strpos($msg,'月经') || strpos($msg,'屌') || strpos($msg,'艹')) {
    echo "含有不当字符，不予发送！";
    $conn->close();
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
if ($row['status'] == -1) {
    echo "Access denied (03)";
    $conn->close();
    exit;
}

$sql = "SELECT * FROM `lc_msg`";
$result = $conn->query($sql);

$sql = "INSERT INTO `lc_msg` (`msgid`, `usrid`, `msg`, `time`, `client`, `type`, `room`, `filename`) VALUES ('".$result->num_rows."', '$usrid', '$msg', '".date('Y-m-d H:i:s', time())."', '$app', '0', '$roomid', '')";
$result = $conn->query($sql);

$msg = str_replace("%26", "&", $msg);
$msg = str_replace("---plus---", "+", $msg);
$msg = str_replace("---jih---", "#", $msg);

if (!file_exists($path)) {
    $handle = fopen($path, 'w+');
    fwrite($handle, $row['name'].' '.date('Y-m-d H:i', time())."\r\n".$msg);
    fclose($handle);
    echo 'Succeed';
} else {
    $handle = fopen($path, 'r');
    $content = fread($handle, filesize($path));
    $content = $row['name'].' '.date('Y-m-d H:i', time())."\r\n".$msg . "\r\n\r\n".$content;
    fclose($handle);
    $handle = fopen($path, 'w');
    fwrite($handle, $content);
    fclose($handle);
    echo 'Succeed';
}

$pathjson = './chatdata/room'.$roomid.'.json';
$jsoncode = '';

$arr = array('usr' => $row['name'], 'msg' => $msg, 'time' => date('Y-m-d H:i', time()), 'uid' => $usrid, 'app' => getappname($appid), 'ip' => getip(), 'html' => false);
$jsonstr = json_encode($arr);
if (!file_exists($pathjson)) {
    $handle = fopen($pathjson, 'w+');
    fwrite($handle, $jsonstr);
    fclose($handle);
} else {
    $handle = fopen($pathjson, 'r');
    $content = fread($handle, filesize($pathjson));
    $content = $jsonstr.','.$content;
    fclose($handle);
    $handle = fopen($pathjson, 'w');
    fwrite($handle, $content);
    fclose($handle);
}

$pathtime = './chatdata/room'.$roomid.'.time.txt';
if (!file_exists($pathtime)) {
    $handle = fopen($pathtime, 'w+');
    fwrite($handle, date('YmdHis', time()));
    fclose($handle);
} else {
    $handle = fopen($pathtime, 'w');
    fwrite($handle, date('YmdHis', time()));
    fclose($handle);
}


$msg = str_replace("&", "&amp;", $msg);
$msg = str_replace(" ", "&nbsp;", $msg);
$msg = str_replace("<", "&lt;", $msg);
$msg = str_replace(">", "&gt;", $msg);
$msg = str_replace("\"", "&quot;", $msg);

$htmlmsg = "<p style='font-size:20px;font-weight:500;'><abbr style='text-decoration:none;' title='uid: ".$row["id"]."  email: ".$row["email"]."'><img src='".$row["picurl"]."' height='22' width='22'/>".$row["name"]."</abbr>&nbsp;<span style='font-size:12px;font-weight:normal;'>".date('Y-m-d H:i:s', time())."</span></p><div id='msg01'><p><abbr style='text-decoration:none;' title='发送自: ".getappname($appid)."  ip: ".getip()."'>".$msg."</abbr></p></div>"."\n";
$pathhtml = "./chatdata/room".$roomid.".html";
if (!file_exists($pathhtml)) {
    $handle = fopen($pathhtml, 'w+');
    fwrite($handle, $htmlmsg);
    fclose($handle);
} else {
    $handle = fopen($pathhtml, 'r');
    $content = fread($handle, filesize($pathhtml));
    $content = $htmlmsg.$content;
    fclose($handle);
    $handle = fopen($pathhtml, 'w');
    fwrite($handle, $content);
    fclose($handle);
}

$conn->close();