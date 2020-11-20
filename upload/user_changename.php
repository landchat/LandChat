<?php
require('./config.php');
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$usrid = $_GET["id"];
$usrpwd = $_GET["pwd"];
$changeto = $_GET["changeto"];

$sql = "SELECT * FROM lc_users WHERE id=".$usrid;
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    $arr = array('result' => 'WRONG', 'name' => '');
    echo json_encode($arr);
    $conn->close();
    exit;
}

$row = $result->fetch_assoc();
if ($usrpwd == $row['pwd']) {
    $conn->query("UPDATE lc_users SET name='{$changeto}' WHERE id=".$usrid);
    $arr = array('result' => 'OK', 'name' => $changeto);
    echo json_encode($arr);
    $conn->close();
    exit;
} else {
    $arr = array('result' => 'WRONG', 'name' => '');
    echo json_encode($arr);
    $conn->close();
}