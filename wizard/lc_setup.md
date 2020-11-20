# LandChat Setup Wizard

Thank you for using `LandChat` on your server. Here's the way for you to setup `LandChat` quickly.

## 1

Clone this repository to your own PC,  then use FTP tools to upload the folder `upload` to your server.

## 2

--Set up LandChat's running environment

These applications are **necessary and very important** to LandChat. You have to install them.

- Operating System: Both Linux and Windows are available. CentOS is recommended.
- Server system like Nginx, IIS or Apache. Nginx(>1.10.0) is recommended.
- Database system: MySQL.
- PHP: Any version of PHP 5 or PHP 7.
- Python: Python 3 recommended. (*optional, but if you need the picture uploading module, install this.*)

## 3

Make a `LandChat` site on your web server. Here's an example config of the `LandChat` site on `nginx`: 

```
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

Create database. **(Very important!)**

Execute these SQL commands in the database of LandChat.

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

Yes, that's very easy!

## 5

Edit **/config.php** to customize your LandChat.

```php
$dbserver="Input your MySQL server, just like: localhost";
$dbuser="Input your MySQL user, just like: root";
$dbpwd="Input your MySQL password of this user.";
$dbname="Input the name of your LandChat database, just like: LandChat";

$localroot="Input the local path of your LandChat Site, just like: /var/www/html/landchat";
$webroot = "Input the web root path of your LandChat Site, just like: https://landchat.ericnth.cn:23564";
```

These lines are in the front of that file. Just edit them by reading the instructions!

## 6

Other things you can do: 

### (1) /web/web_picupload.py

Find this line first:

```python
headers = {'Authorization': 'XmLIrpcug5LCAkxpPAf9bcaFtWNHWGra'}
```

Then open [sm.ms](sm.ms), to apply an API Key (First register, then get it on: [https://sm.ms/home/apitoken](https://sm.ms/home/apitoken)), to replace the value of `Authorization`, so that all pictures could be uploaded to your own account.

### (2) /web/admin/ifr.php

Find this line first:

```php
if ($_COOKIE['lc_uid'] != "Enter the UID of your site Administrator" || $_COOKIE['lc_passw'] != "Enter the Password of your site Administrator") {
    header("Location: ".$webroot."/web/login.html");
}
```

Then, replace `Enter the UID of your site Administrator` and `Enter the Password of your site Administrator` with the information of the site administrator's `LandChat Account`.



You can do these operations optionally. But doing these can improve your `LandChat` using exprience!



---



If you meet any problem during the installation of LandChat, please contact us.
