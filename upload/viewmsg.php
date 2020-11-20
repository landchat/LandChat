<?php
require('./config.php');
$roomid = $_GET['room'];
$path = './chatdata/room'.$roomid.'.txt';

if (!file_exists($path)) {
    echo '没有找到聊天室。在这里发送第一条消息来创建聊天室。';
} else {
    $handle = fopen($path, 'r');
    $content = fread($handle, filesize($path));
    fclose($handle);
    echo $content;
}