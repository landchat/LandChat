<?php

// 允许上传的图片后缀
$allowedExts = array("jpeg", "jpg", "png", "gif", "webp", "JPG", "PNG", "JPEG", "WEBP", "GIF", "bmp", "BMP", "tif", "tiff", "TIF", "TIFF", "ICO");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);        // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/tiff")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/webp")
|| ($_FILES["file"]["type"] == "image/x-icon"))
&& ($_FILES["file"]["size"] < 3072000)    // 小于 3MB
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        $picpos = "picupload/" .mt_rand(100000000,999999999).".".$extension/*. $_FILES["file"]["name"]*/;
        move_uploaded_file($_FILES["file"]["tmp_name"], $picpos);
        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        //echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //$resfile = "./picupload/tmp/_uploadres_tmp".mt_rand(1000,9999).".txt";
        //echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
        $cmd="/usr/bin/python /www/wwwroot/landchat/web/web_picupload.py /www/wwwroot/landchat/web/".$picpos;
        echo '<div style="align:center;"><img src="https://img.zcool.cn/community/012b3c599276cc0000002129ebff53.gif"></div>';
        echo '<script>if(typeof(Storage) !== "undefined") {window.location.replace(\'./picupload_res.php?cr=\'+localStorage.currentcr+\'&c='.$cmd.'\');}else{alert(\'不支持本地存储或没有打开过LandChat主页，无法上传!\')}</script>';
        //echo "文件存储位置：".$picpos."<br>";
        //echo "上传结果：<br>".$urlrsp."<br>";
    }
}
else
{
    echo "非法的文件格式或文件大于3MB限制";
}
?>
