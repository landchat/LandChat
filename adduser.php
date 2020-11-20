<?php
//INSERT INTO `lc_users` (`id`, `pwd`, `name`, `regitime`, `email`, `picurl`) VALUES ('', '', '', '', '', '')
//Default pic: https://i.loli.net/2020/09/12/Co5Kxh26J9rbW4j.jpg

require('./config.php');

if (isapp($_GET["app_id"]) != 1) {
    echo "0";
    exit;
}
if (empty($_GET["pwd"]) || empty($_GET["name"]) || empty($_GET["email"])) {
    echo "0";
    exit;
}

$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if ($_GET["picurl"] == '') {
    $picurl = "https://i.loli.net/2020/09/12/Co5Kxh26J9rbW4j.jpg";
} else {
    $picurl = $_GET["picurl"];
}

$regitime = date('Y-m-d H:i', time());
$id = mt_rand(100000, 999999);

$sql = "SELECT * FROM lc_users WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "0";
    exit;
}
$sql = "SELECT * FROM lc_users WHERE name=".$_GET["name"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "0";
    exit;
}

$sql = "INSERT INTO `lc_users` (`id`, `pwd`, `name`, `regitime`, `email`, `picurl`) VALUES ('".$id."', '".$_GET["pwd"]."', '".$_GET["name"]."', '".$regitime."', '".$_GET["email"]."', '".$picurl."')";
$result = $conn->query($sql);
echo $id;
exit;