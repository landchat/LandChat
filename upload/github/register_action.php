<?php
require("./../config.php");
if (empty($_REQUEST['access_token'])) {
    exit;
}
//获取用户信息
$ch =curl_init();
$headers = array();
$headers[]='Accept: application/json';
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0';
$headers[] = 'Authorization: token '.$_REQUEST['access_token'].'';
curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/user?'.$content);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($ch);
curl_close($ch);
//echo $content;
//https://i.loli.net/2020/10/06/tBFa5CxpZYzKoQV.png
$content2 = json_decode($content);
//echo $content;
//注册！
//echo $content2->{'email'};
$ch =curl_init();
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0';
curl_setopt($ch, CURLOPT_URL, $webroot.'/signupa.php?pwd='.$content2->{'id'}.'&name='.$content2->{'login'}.'&email='.$content2->{'email'}.'&picurl=https://i.loli.net/2020/10/06/tBFa5CxpZYzKoQV.png');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
if (curl_exec($ch)!=true) {
    echo "注册失败！";
}
curl_close($ch);