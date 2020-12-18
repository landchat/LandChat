<?php
require('./config.php');
$conn = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$room = $_REQUEST['room'];
$sql = "SELECT * FROM `lc_msg` WHERE room='".$room."' ORDER BY `lc_msg`.`msgid` DESC";
$result = $conn->query($sql);

if ($result->num_rows < 1) {
    echo "没有找到房间\"$room\"。在下面发送第一条消息来创建这个房间。";
    $conn->close();
    exit;
}

while ($row = $result->fetch_assoc()) {
    if ($row['type'] == -1) continue;
    $sql_usr = "SELECT * FROM lc_users WHERE id=".$row['usrid'];
    $result_usr = $conn->query($sql_usr);
    echo "<div>";
    if ($result_usr->num_rows < 1) {
        $row_usr = $result_usr->fetch_assoc();
        echo "<p class='usrnp'>[已注销]&nbsp;";
    } else {
        $row_usr = $result_usr->fetch_assoc();
        echo "<p class='usrnp'><abbr class='ntdabbr' title='uid: ".$row['usrid']."  email: ".$row_usr['email']."'><img src='".$row_usr['picurl']."' height='22' width='22'/>".$row_usr['name']."</abbr>&nbsp;";
    }
    if ($row['type'] == 0) {
        echo "<span class='msgp'>".$row['time']."</span></p><div id='msg01'><abbr class='ntdabbr' title='发送自: ".$row['client']." 消息id: ".$row['msgid']."'><p>".$row['msg']."</p></abbr></div>";
    } else if ($row['type'] == 1) {
        echo "<span class='msgp'>".$row['time']."</span></p><div id='msg01'><abbr class='ntdabbr' title='发送自: ".$row['client']." 消息id: ".$row['msgid']."'><a href=\"".$row['msg']."\" target=\"_blank\"><img src=\"".$row['msg']."\" alt=\"[图片]".$row['msg']."\"/></a></abbr></div>";
    } else if ($row['type'] == 3) {
        echo "<span class='msgp'>".$row['time']."</span></p><div id='msg01'><abbr class='ntdabbr' title='发送自: ".$row['client']." 消息id: ".$row['msgid']."'><div id=\"filebox\"><h3>文件 File: <a href=\"".$row['msg']."\" download=\"".$row['filename']."\" target=\"_blank\"><span class='fbs'>".$row['filename']."</span></a></h3></div></abbr></div>";
    } else if ($row['type'] == 2) {
        echo "<span class='msgp'>".$row['time']."</span></p><div id='msg01'><abbr class='ntdabbr' title='发送自: ".$row['client']." 消息id: ".$row['msgid']."'><div class=\"urls\"><a href=\"".$row['msg']."\" target=\"_blank\" class='ntdabbr'><p><span style=\"font-size:16px\">&nbsp;链接 Link</span><br/><span style=\"font-size:10px\">&nbsp;&nbsp;".$row['msg']."&nbsp;&nbsp;&nbsp;</span></p></a></div></abbr></div>";
    }
    echo "</div>";
}
$conn->close();
exit;
