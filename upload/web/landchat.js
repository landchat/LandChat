function loadJs(path,callback){
    var header=document.getElementsByTagName("head")[0];
    var script=document.createElement('script');
    script.setAttribute('src',path);
    header.appendChild(script);
    if(!false){
        script.onload=function(){
            console.log("非ie");
            callback();
        }
    }else{
        script.onreadystatechange=function(){
            if(script.readystate=="loaded" ||script.readState=='complate'){
                console.log("ie");
                callback();
            }
        }
    }
}
function apicall(apiurl) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if ((xmlhttp.status == 404) || (xmlhttp.status == 403) || (xmlhttp.status == 502)) {
		    return "Failed";
		} else {
		    return xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", apiurl, true);
	xmlhttp.send();
}
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
function mdcompile(){
    var text = document.getElementById("ibox").value;
    var converter = new showdown.Converter();
    var html = converter.makeHtml(text);
    return html;
}
        function sendmsg() {
            var content = "";
            var x = document.getElementById("ibox");
            //content = content + x.value;
            content = mdcompile();
            if (content.length > 1900) {
		        swal({title:"错误",text:"消息太长了，无法发送......",icon:"error"});
                return;
            }
            var str = content.replace(/&/g, '%26');
            var str = content.replace(/#/g, '[井号]');
            var str = content.replace(/\+/g, '---plus---');
            //var str = content.replace(/%/g, '%25');
            //var str = content.replace(/\//g, '%2F');
            var str2 = str/*.replace(/?/g, '%3f')*/;
            if (str2 == "") {
		        swal({title:"错误",text:"空消息!",icon:"error"});
                return;
            } else {
                sendmsgrsp(str2);
            }
            x.value="";
        }
function changeroom() {
    //alert('changeroom');
    var x = document.getElementById("ccr");
            var content = x.value;
            var y = document.getElementById("prvcr");
            y.innerHTML = content;
            x.value="";
            console.log("c.changeroom: "+document.getElementById("prvcr").innerHTML);
            x = document.getElementById("downdat");
            x.href="./../chatdata/room"+content+".html";
            x.download="LandChat_data_"+content+".htm";
    if(typeof(Storage) !== "undefined") {
        //if (localStorage.currentcr) {
            localStorage.currentcr = content;
        //}
    } else {
		swal({title:"警告",text:'您的浏览器不支持Local Storage。建议使用Chrome/firefox/新版Edge浏览器访问此页面，否则将无法正常使用图片上传/聊天室记忆等LandChat新功能。同时我们也建议您在LandChat运行时不要清理浏览器的Local Storage。',icon:"warning"});
    }
            loadXMLDoc();
}
function startchangetheme() {
    if(typeof(Storage) !== "undefined") {
        if (localStorage.currenttheme) {
            window.location.replace("?theme="+localStorage.currenttheme);
        } else {
            localStorage.currenttheme = "blue";
            window.location.replace("?theme=blue");
        }
    } else {
		swal({title:"警告",text:'您的浏览器不支持Local Storage。建议使用Chrome/firefox/新版Edge浏览器访问此页面，否则将无法正常使用图片上传/聊天室记忆等LandChat新功能。同时我们也建议您在LandChat运行时不要清理浏览器的Local Storage。',icon:"warning"});
    }
}
function startstoretheme(themenow) {
    if(typeof(Storage) !== "undefined") {
        if (themenow === "") {
            return;
        } else {
            localStorage.currenttheme = themenow;
        }
    } else {
		swal({title:"警告",text:'您的浏览器不支持Local Storage。建议使用Chrome/firefox/新版Edge浏览器访问此页面，否则将无法正常使用图片上传/聊天室记忆等LandChat新功能。同时我们也建议您在LandChat运行时不要清理浏览器的Local Storage。',icon:"warning"});
    }
}
function startchangeroom() {
    if (localStorage.currentcr) {
            var content = localStorage.currentcr;
            //alert(content);
            var y = document.getElementById("prvcr");
            y.innerHTML = content;
            console.log("s.changeroom: "+document.getElementById("prvcr").innerHTML);
            x = document.getElementById("downdat");
            x.href="./../chatdata/room"+content+".html";
            x.download="LandChat_data_"+content+".htm";
            loadXMLDoc();
    } else {
        localStorage.currentcr = "";
        changeroom();
    }
    document.getElementById("yourid").innerHTML = "您的UID: " + getCookie("lc_uid");
}
function changenc() {
    var x = document.getElementById("cnc");
    if (x.value == "") {
		swal({title:"错误",text:"昵称不能为空!",icon:"error"});
        return;
    }
    var content = x.value;
    x.value="";
    cncaction(content);
}
function change3() {
    var x = document.getElementById("c3");
    if (x.value == "") {
		swal({title:"错误",text:"密码不能为空!",icon:"error"});
        return;
    }
    var content = x.value;
    x.value="";
    c3act(content);
}
function change4() {
    var x = document.getElementById("c4");
    if (x.value == "") {
		swal({title:"错误",text:"头像链接不能为空!",icon:"error"});
        return;
    }
    var content = x.value;
    x.value="";
    c4act(content);
}
function loadXMLDoc()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		//  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		// IE6, IE5 浏览器执行代码
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		    document.getElementById("msend").removeAttribute("disabled");
		    document.getElementById("msend").value="发送";
		    document.getElementById("psend").removeAttribute("disabled");
		    document.getElementById("psend").value="更多功能";
		    if (document.getElementById("msgbox").innerHTML!==xmlhttp.responseText) {
		        document.getElementById("msgbox").innerHTML=xmlhttp.responseText;
		    }
		} else if (xmlhttp.status==404) {
		    document.getElementById("msend").removeAttribute("disabled");
		    document.getElementById("msend").value="发送";
		    document.getElementById("psend").removeAttribute("disabled");
		    document.getElementById("psend").value="更多功能";
		    document.getElementById("msgbox").innerHTML="没有找到房间\""+document.getElementById("prvcr").innerHTML+"\"。在下面发送第一条消息来创建这个房间。";
		} else if (xmlhttp.status==403) {
		    document.getElementById("msgbox").innerHTML="该聊天室已经被禁用。请联系LandChat管理员。";
		    document.getElementById("msend").disabled="disabled";
		    document.getElementById("msend").value="已被禁用";
		    document.getElementById("psend").disabled="disabled";
		    document.getElementById("psend").value="已被禁用";
		}
	}
	//xmlhttp.open("GET","./../chatdata/room"+document.getElementById("prvcr").innerHTML+".html?r="+parseInt(randomNum(1000, 9999)),true);
	xmlhttp.open("GET","./../viewhtml.php?room="+document.getElementById("prvcr").innerHTML+"&r="+parseInt(randomNum(1000, 9999)),true);
	xmlhttp.send();
	onrefresh();
	setTimeout('loadXMLDoc()', 15000);
}
function downloadchat() {
    var chatd;
    chatd="./../chatdata/room"+document.getElementById("prvcr").innerHTML+".html";
    window.location.href=chatd;
}
function oninputkeypressed() {
    var e = window.event;
    var keyCode = e.keyCode || e.which;
    if (keyCode == '13'){
      // Enter pressed
      sendmsg();
    }
}
function cncaction(cnc) {
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
		    swal({title:"错误",text:"更改失败!",icon:"error"});
		}
	}
	var addmsgstr = "../user_changename.php?id=" + getCookie("lc_uid") + "&pwd=" + getCookie("lc_passw") + "&changeto=" + cnc;
	xmlhttp.open("GET", addmsgstr, true);
	console.log("Change Name: " + addmsgstr);
	xmlhttp.send();
	setTimeout('loadXMLDoc()', 500);
}
function c3act(cnc) {
    apicall("../user_changepwd.php?id=" + getCookie("lc_uid") + "&pwd=" + getCookie("lc_passw") + "&changeto=" + cnc);
	setTimeout('loadXMLDoc()', 500);
	setTimeout('window.location.replace("./login.html")', 1000);
}
function c4act(cnc) {
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
		    swal({title:"错误",text:"更改失败!",icon:"error"});
		}
	}
	var addmsgstr = "../user_changepic.php?id=" + getCookie("lc_uid") + "&pwd=" + getCookie("lc_passw") + "&changeto=" + cnc;
	xmlhttp.open("GET", addmsgstr, true);
	console.log("Change Name: " + addmsgstr);
	xmlhttp.send();
	setTimeout('loadXMLDoc()', 500);
}
function sendmsgrsp(msg) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		//  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
		xmlhttp = new XMLHttpRequest();
	} else {
		// IE6, IE5 浏览器执行代码
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("rspbox").innerHTML = "发送状态: " + xmlhttp.responseText;
		} else {
			document.getElementById("rspbox").innerHTML = "消息正在发送中......";
		}
	}
	var addmsgstr = "../addmsg_html.php?id=" + getCookie("lc_uid") + "&pwd=" + getCookie("lc_passw") + "&room=" + document.getElementById("prvcr").innerHTML + "&msg=" + encodeURI(msg) + "&app_id=jA2cR2eA4gG0nQ1dQ3eR2bP0wK7hA0";
	xmlhttp.open("GET", addmsgstr, true);
	console.log("Send Message: " + addmsgstr);
	xmlhttp.send();
	setTimeout('loadXMLDoc()', 500);
	setTimeout('document.getElementById("rspbox").innerHTML = "";', 2000);
}
function flushtime() {
    var date=new Date();
    var newdate=date.toLocaleString('chinese', { hour12: false });
    document.getElementById("lctimer").innerHTML = '时间: '+newdate;
	setTimeout('flushtime()', 333);
}