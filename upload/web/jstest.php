<?php
require('./../config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script>
function getCookie(cname)
{
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) 
  {
    var c = ca[i].trim();
    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
  return "";
}
function randomNum(minNum,maxNum){ 
    switch(arguments.length){ 
        case 1: 
            return parseInt(Math.random()*minNum+1,10); 
        break; 
        case 2: 
            return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10); 
        break; 
            default: 
                return 0; 
            break; 
    } 
} 
function json2html(jstxt) {
    var obj = JSON.parse(jstxt);
    console.log("json->html by EricNTH");
}
function jsonload() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		//  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
		xmlhttp = new XMLHttpRequest();
	} else {
		// IE6, IE5 浏览器执行代码
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if ((xmlhttp.status == 404) || (xmlhttp.status == 403) || (xmlhttp.status == 502)) {
			alert("xmlhttp returns HTTP_ERROR_404/403/502, please try again! (jsonload())");
		} else {
		    json2html(xmlhttp.responseText);
		}
	}
	//var addmsgstr = "../view-source:https://landchat.ericnth.cn:23564/viewjson.php?room=" + getCookie("lc_uid") + "&pwd=" + getCookie("lc_passw") + "&changeto=" + cnc;
	xmlhttp.open("GET","../viewjson.php?room="+/*document.getElementById("prvcr").innerHTML*/""+"&rseed="+parseInt(randomNum(1000, 9999)),true);
	xmlhttp.send();
	//setTimeout('jsonload()', 500);
}
        </script>
    </head>
    <body>
        <div id="main"></div>
        <script>jsonload();</script>
    </body>
</html>