<?php
if (empty($_REQUEST['url'])) {
    exit;
}
//获取令牌
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0';
$ch =curl_init();
curl_setopt($ch, CURLOPT_URL, $_REQUEST['url']);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$content = curl_exec($ch);
curl_close($ch);
