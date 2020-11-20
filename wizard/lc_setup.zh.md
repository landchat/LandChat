# LandChat设置向导

感谢您在服务器上使用“LandChat”。下面是快速设置“LandChat”的方法。

***注意：因为当时先写了英语文档，所以此文件大部分为机器翻译。请以英文文档为准。***

## 1

将这个存储库复制到你自己的电脑上，然后使用FTP工具将文件夹上传到你的服务器上。

## 2

——设置LandChat的运行环境



这些应用对于LandChat来说是非常必要和重要的。你必须安装它们。

- 操作系统:Linux和Windows都可用。CentOS是推荐的。

- 服务器系统，如Nginx, IIS或Apache。Nginx是推荐的。

- 数据库系统:MySQL。

- PHP:任何版本的PHP 5或PHP 7。

- Python: Python 3推荐。(*可选，但如果你需要图片上传模块，安装这个。)

## 3

在你的网络服务器上创建一个“LandChat”网站。下面是nginx上的LandChat网站的配置示例:

```json
server {
    listen 80;
	listen 443 ssl http2;
	listen [::]:443 ssl http2;
    listen [::]:80;
    server_name landchat.ericnth.cn;
    index index.php index.html index.htm;
    root /www/wwwroot/landchat;
    
    #Place your SSL config here~
    
    location ~ ^/(\.user.ini|\.htaccess|\.git|\.svn|\.project|LICENSE|README.md)
    {
        return 403;
    }
    
    location ~ .*\.(gif|jpg|jpeg|png|bmp|swf)$
    {
        expires      30d;
        error_log off;
        access_log /dev/null;
    }
    
    location ~ .*\.(js|css)?$
    {
        expires      12h;
        error_log off;
        access_log /dev/null; 
    }
    access_log  /www/wwwlogs/landchat.ericnth.cn.log;
    error_log  /www/wwwlogs/landchat.ericnth.cn.error.log;
}
```



## 4

一个很重要的操作：创建数据表。

在您服务器上landchat的数据库中依次执行以下命令。

```sql
CREATE TABLE `lc_users` (
  `id` int(11) NOT NULL,
  `pwd` text NOT NULL,
  `name` text NOT NULL,
  `regitime` text NOT NULL,
  `email` text NOT NULL,
  `picurl` text NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```sql
CREATE TABLE `lc_msg` (
  `msgid` int(20) NOT NULL,
  `usrid` int(11) NOT NULL,
  `msg` text NOT NULL,
  `time` text NOT NULL,
  `client` text NOT NULL,
  `type` int(11) NOT NULL,
  `room` text NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

```

如您所见，这很简单。数据表的创建就此完成！

## 5

编辑`config.php`。自定义您的LandChat。

```php
$dbserver="输入你的MySQL服务器，就像:localhost";

$dbuser="输入你的MySQL用户，就像:root";

$dbpwd="输入此用户的MySQL密码";

$dbname="输入你的LandChat数据库名，就像:LandChat";



$localroot="输入你的LandChat网站的本地路径，就像:/var/www/html/landchat";

$webroot = "输入您的LandChat网站的网站根路径，就像:https://landchat.ericnth.cn:23564";
```

这些行在该文件的前面。通过阅读双引号内的说明来编辑它们!



## 6

你可以做的其他事情:

### (1) / web / web_picupload.py

先找到这一行:

header = {'Authorization': 'XmLIrpcug5LCAkxpPAf9bcaFtWNHWGra'}

然后打开[sm.ms](sm.ms)，应用一个API密钥(首先注册，然后获取它:[https://sm.ms/home/apitoken](https://sm.ms/home/apitoken)，以替换`Authorization`后的值，这样所有图片都可以上传到您自己的帐户中。



### (2) / web / admin / ifr.php

先找到这一行:

```php
if ($_COOKIE['lc_uid'] != "Enter the UID of your site Administrator" || $_COOKIE['lc_passw'] != "Enter the Password of your site Administrator") {
    header("Location: ".$webroot."/web/login.html");
}
```

然后，将“输入您的网站管理员的UID”和“输入您的网站管理员的密码”替换为网站管理员的“LandChat帐户”信息。



您可以选择性进行这些操作。但是做这些可以提高你的LandChat用户体验!



---



最后，如果您在安装LandChat过程中遇到任何问题，请联系我们!