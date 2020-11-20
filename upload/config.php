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