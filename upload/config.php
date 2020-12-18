<?php

$dbserver="Input your MySQL server, just like: localhost";
$dbuser="Input your MySQL user, just like: root";
$dbpwd="Input your MySQL password of this user.";
$dbname="Input the name of your LandChat database, just like: LandChat";

$localroot="Input the local path of your LandChat Site, just like: /var/www/html/landchat";
$webroot = "Input the web root path of your LandChat Site, just like: https://landchat.ericnth.cn:23564";

//DO NOT EDIT the functions below (if you aren't an expert!)
function getappname($appkey) {
    if ($appkey == "mE1aF6cH0jC0jC5pA0lA0cB1kE0cC5") {
        return "LandChat Mac";
    } else if ($appkey == "") {
        return /*(GetBrowser()." Browser-".GetOs())*/"Unknown Browser";
    } else if ($appkey == "jA2cR2eA4gG0nQ1dQ3eR2bP0wK7hA0") {
        return "LandChat Web (".GetBrowser()."-".GetOs().")";
    } else {
        return "Unknown";
    }
}
function isapp($appkey) {
    if ($appkey == "mE1aF6cH0jC0jC5pA0lA0cB1kE0cC5") {
        return 1;
    } 
    if ($appkey == "jA2cR2eA4gG0nQ1dQ3eR2bP0wK7hA0") {
        return 1;
    }
    return 0;
}
function getip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return $ip;
}
function GetBrowser() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $br)) {
            $br = 'MSIE';
        } elseif (preg_match('/Firefox/i', $br)) {
            $br = 'Firefox';
        } elseif (preg_match('/Chrome/i', $br)) {
            $br = 'Chrome';
        } elseif (preg_match('/Safari/i', $br)) {
            $br = 'Safari';
        } elseif (preg_match('/Opera/i', $br)) {
            $br = 'Opera';
        } else {
            $br = 'Other';
        }
        return $br;
    } else {
        return "Unknown";
    }
}
function GetOs() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $OS = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i', $OS)) {
            $OS = 'Windows';
        } elseif (preg_match('/mac/i', $OS)) {
            $OS = 'macOS';
        } elseif (preg_match('/linux/i', $OS)) {
            $OS = 'Linux';
        } elseif (preg_match('/unix/i', $OS)) {
            $OS = 'Unix';
        } elseif (preg_match('/bsd/i', $OS)) {
            $OS = 'BSD';
        } else {
            $OS = 'Other';
        }
        return $OS;
    } else {
        return "Unknown";
    }
}
/*
function send_mail_by_smtp($address, $subject, $body, $nohtml) {

    date_default_timezone_set("Asia/Shanghai");//设定时区东八�?

    //$mail = new PHPMailer\PHPMailer\PHPMailer();



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //服务器配�?    $mail->CharSet ="UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = 'smtp.163.com';                // SMTP服务�?    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    $mail->Username = 'eric_ni2008@163.com';                // SMTP 用户�? 即邮箱的用户�?    $mail->Password = 'GTYHKCRNSRROVYAM';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    //$mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    //$mail->Port = 465;                            // 服务器端�?25 或�?65 具体要看邮箱服务器支�?    $mail->Port = 25;                            // 服务器端�?25 或�?65 具体要看邮箱服务器支�?
    $mail->setFrom('eric_ni2008@163.com', 'LandChat');  //发件�?    $mail->addAddress($address, 'LandChat_user');  // 收件�?    //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
    $mail->addReplyTo('noreply@noreply.com', 'noreply'); //回复的时候回复给哪个邮箱 建议和发件人一�?    //$mail->addCC('cc@example.com');                    //抄�?    //$mail->addBCC('bcc@example.com');                    //密�?
    //发送附�?    // $mail->addAttachment('../xy.zip');         // 添加附件
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文档格式发�? 发送后客户端可直接显示对应HTML内容
    $mail->Subject = $subject . time();
    $mail->Body    = $body . date('Y-m-d H:i:s');
    $mail->AltBody = $nohtml;

    $mail->send();
    return 0;
} catch (Exception $e) {
    echo '邮件发送失�? ', $mail->ErrorInfo;
    return 1;
}
}*/