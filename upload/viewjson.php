<?php
require('./config.php');
date_default_timezone_set('PRC');
$flushtime = $_GET['flushtime'];
$timepath = './chatdata/room'.$roomid.'.time.txt';
if (file_exists($timepath)) {
    $handle = fopen($timepath, 'r');
    $content = fread($handle, filesize($timepath));
    //echo "[".$flushtime."|".$content."]";
    if (intval($flushtime) > intval($content)) {
        echo "Nothing-New";
        exit;
    }
}


$roomid = $_GET['room'];
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "SELECT * FROM lc_msg WHERE room='".$roomid."'";
$result = $conn->query($sql);
$json = "{[\"messages\"]:{";
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $arr = array('msgid' => $row['msgid'], 'uid' => $row['uid'], 'time' => $row['time'], 'app' => $row['client'], $row['msg'] => $row['msg'], 'type' => $row['type'], 'filename' => $row['filename']);
        $json = $json.json_encode($arr);
        $json = $json.",";
    }
    $json = $json."}}";
    echo $json;
} else {
    $arr = array("Message"=>"Room Not Found");
    $json = json_encode($arr);
    echo $json;
}


//$path = './chatdata/room'.$roomid.'.json';

/*
if (!file_exists($path)) {
    echo "{\"Message\":\"Room Not Found\"}";
} else {
    $handle = fopen($path, 'r');
    $content = fread($handle, filesize($path));
    fclose($handle);
    echo "{\"messages\":[".$content."]}";
}*/