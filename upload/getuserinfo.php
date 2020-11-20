<?php
require('./config.php');
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$usrid = $_GET["id"];

$sql = "SELECT * FROM lc_users WHERE id=".$usrid;
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    $arr = array('result' => 'WRONG', 'name' => '');
    echo json_encode($arr);
    $conn->close();
    exit;
}

$row = $result->fetch_assoc();

    $arr = array('result' => 'CORRECT', 'name' => $row['name'], 'regitime' => $row['regitime'], 'email' => $row['email'], 'profile_photo' => $row['picurl']);
    echo json_encode($arr);
    $conn->close();
    exit;