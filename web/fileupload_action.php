<?php

// 允许上传的图片后缀
$allowedExts = array("doc", "docx", "ppt", "pptx", "xls", "xlsx", "pdf", "rtf", 'txt', "html", "cpp", "c", "py", "bas", "nas", "zip", "7z", "js", "css", "dmg", "iso", "rar", "exe", "exec", "dll", "bin", "json", "md", "xml", "tex", "mp3", "mp4", "avi", "qt", "mov", "mpg", "ra", "rm", "wav", "wmv", "wma");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);        // 获取文件后缀名
if (/*(($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& */($_FILES["file"]["size"] < 3072000)    // 小于 3MB
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        $filepos = "fileupload/" .mt_rand(100000000,999999999).'_'.$_FILES["file"]["name"]/*. $_FILES["file"]["name"]*/;
        move_uploaded_file($_FILES["file"]["tmp_name"], $filepos);
        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo '<div style="align:center;"><img src="https://img.zcool.cn/community/012b3c599276cc0000002129ebff53.gif"></div>';
        echo '<script>if(typeof(Storage) !== "undefined") {window.location.replace(\'./fileupload_res.php?cr=\'+localStorage.currentcr+\'&f='.$filepos.'&n='.$_FILES["file"]["name"].'\');}else{alert(\'不支持本地存储或没有打开过LandChat主页，无法上传!\')}</script>';
    }
}
else
{
    echo "非法的文件格式或文件大于2MB限制";
    exit;
}
?>