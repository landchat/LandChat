<?php
require('./config.php');
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$usrid = $_REQUEST["id"];
$usrpwd = $_REQUEST["pwd"];
$todelete = $_REQUEST["todelete"];

$sql = "SELECT * FROM lc_users WHERE id=".$usrid;
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    $arr = array('result' => 'BAD', 'denied' => true);
    echo json_encode($arr);
    $conn->close();
    exit;
}


$row = $result->fetch_assoc();
if ($usrpwd == $row['pwd']) {
    $sql = "SELECT * FROM lc_msg WHERE usrid=".$_REQUEST['id']."&&msgid=".$todelete;
    $result = $conn->query($sql);
    if ($result->num_rows != 1) {
        $arr = array('result' => 'NOT_FOUND', 'denied' => true);
        echo json_encode($arr);
        $conn->close();
        exit;
    }
    $row2 = $result->fetch_assoc();
    $sql = "UPDATE `lc_msg` SET `type` = '-1' WHERE `lc_msg`.`msgid` = $todelete";
    $result = $conn->query($sql);
    echo "消息撤回成功！";
    $conn->close();
    exit;
} else {
    $arr = array('result' => 'PWD_WRONG', 'denied' => true);
    echo json_encode($arr);
    $conn->close();
}