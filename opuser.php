<?php
require('./config.php');

$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//UPDATE `lc_users` SET `email` = '?' WHERE `lc_users`.`id` = 22372;
$yourid = $_POST['id'];
$op = $_POST['op'];
if ($op == 'disable') {
    if ($yourid == '') {
        echo "失败";
        $conn->close();
        exit;
    }
    $sql = "UPDATE `lc_users` SET `status` = '-1' WHERE `id` = $yourid;";
} else if ($op == 'enable') {
    if ($yourid == '') {
        echo "失败";
        $conn->close();
        exit;
    }
    $sql = "UPDATE `lc_users` SET `status` = '0' WHERE `id` = $yourid;";
} else if ($op == 'dashe') {
    $sql = "UPDATE `lc_users` SET `status` = '0';";
} else if ($op == 'disableall') {
    $sql = "UPDATE `lc_users` SET `status` = '-1';";
} else {
    $sql = "SELECT * from lc_users';";
    echo "没有成功";
}
$result = $conn->query($sql);
echo "完成";
$conn->close();
exit;