<?php
if (empty($_REQUEST['code'])) {
    exit;
}
$code=$_REQUEST['code'];
$cid='63edfb91a559c191a3a0';
$csec='caad753ecd7d5408a29d3ee5ddf4b16735577a37';
//获取令牌
$headers = array();
$headers[]='application/json';
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0';
$ch =curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://github.com/login/oauth/access_token?client_id='.$cid."&client_secret=".$csec."&code=".$code);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$content = curl_exec($ch);
curl_close($ch);
//获取用户信息
//echo $content;
//备用图片链接 https://i.loli.net/2020/10/06/y3ImtXvwbcSr9Mh.gif
echo "<!DOCTYPE html><html><head><meta http-equiv='refresh' content='1.0;url=./register_action.php?".$content.'\'></head><body><div style="align:center;"><img src="https://img.zcool.cn/community/012b3c599276cc0000002129ebff53.gif"></div></body></html>\'';