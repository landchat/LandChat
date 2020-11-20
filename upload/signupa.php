<?php
//INSERT INTO `lc_users` (`id`, `pwd`, `name`, `regitime`, `email`, `picurl`) VALUES ('', '', '', '', '', '')
//Default pic: https://i.loli.net/2020/09/12/Co5Kxh26J9rbW4j.jpg

require('./config.php');
/*
if (isapp($_GET["app_id"]) != 1) {
    echo "0";
    exit;
}*/
if ((empty($_GET["pwd"]) || empty($_GET["name"]) || empty($_GET["email"])) && ($_REQUEST['fromadmin'] != 'true')) {
    echo "Failed, please try again!";
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

if ($_REQUEST['fromadmin'] == 'true') {
    $picurl = "https://i.loli.net/2020/09/12/Co5Kxh26J9rbW4j.jpg";
    $id = $_REQUEST['id'];
    $pwd = $_REQUEST['id'];
    $name = $_REQUEST['id'];
    $email = $_REQUEST['id']."@hy.sh.cn";
} else {
    $id = mt_rand(100000, 999999);
    $pwd = $_REQUEST['pwd'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
}
$sql = "SELECT * FROM lc_users WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Failed!";
    exit;
}
$sql = "SELECT * FROM lc_users WHERE name=".$_GET["name"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Failed!";
    exit;
}

$sql = "INSERT INTO `lc_users` (`id`, `pwd`, `name`, `regitime`, `email`, `picurl`) VALUES ('".$id."', '".$pwd."', '".$name."', '".$regitime."', '".$email."', '".$picurl."')";
$result = $conn->query($sql);

    setcookie("lc_debug","DEBUG".mt_rand(1000000, 9999999),time()+3600*24*30,'/','.landchat.ericnth.cn');
    setcookie("lc_uid",$id,time()+3600*24*30,'/','.landchat.ericnth.cn');
    setcookie("lc_passw",$_GET["pwd"],time()+3600*24*30,'/','.landchat.ericnth.cn');
echo "注册完成✅，请您尝试登录（网页版LandChat: <a href='$webroot/web/index.php' target='_blank'>点我进入</a>）。<br/>您的id是: ".$id."。您的密码是: ".$_GET["pwd"]."。<br/><b>请一定要妥善保管并牢牢记住您的id和密码！！</b>";
exit;