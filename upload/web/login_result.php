<?php
require('./../config.php');
date_default_timezone_set('PRC');
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM lc_users WHERE id=".$_POST["usr"];
$result = $conn->query($sql);
if ($result->num_rows != 1) {
    echo "<!DOCTYPE html><html><head><meta http-equiv='refresh' content='1;url=login.html'></head><body>登录失败，请重试！<script>setTimeout(\"window.location.replace('login.html')\", 1000);</script></body></html>";
    $conn->close();
    exit;
}else{
    $row = $result->fetch_assoc();
    if ($_POST["pwd"] != $row["pwd"]) {
        echo "<!DOCTYPE html><html><head><meta http-equiv='refresh' content='1;url=login.html'></head><body>密码错误，请重试！<script>setTimeout(\"window.location.replace('login.html')\", 1000);</script></body></html>";
        $conn->close();
        exit;
    }
    setcookie("lc_debug","DEBUG".mt_rand(1000000, 9999999),time()+3600*24*30,'/');
    setcookie("lc_uid",$_POST["usr"],time()+3600*24*30,'/');
    setcookie("lc_passw",$_POST["pwd"],time()+3600*24*30,'/');
    //header("Location:index.php");
    echo "<script>window.location.href='index.php';</script>";
    $conn->close();
}

?>