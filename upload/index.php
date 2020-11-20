<?php
require('./config.php');
?>
<!DOCTYPE html>
<html manifest="./lc.appcache">
    <head>
        <title>LandChat</title>
        <link rel="shortcut icon" href="<?php echo $webroot?>/landchat_64.jpg" type="image/x-icon">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta http-equiv="Cache" content="no-cache">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
        .mainbox {
            /*display: flex;
            justify-content: center;*/
            align-items: center;
            position:absolute;
            left: 30%;
            top: 10%;
            height: 50%;
            width: 40%;
        }
        </style>
        <script>
            function loadlc() {
                setTimeout("document.getElementById('pbmain').style='width:20%';", 300);
                setTimeout("document.getElementById('pbmain').style='width:50%';", 750);
                setTimeout("document.getElementById('pbmain').style='width:80%';", 1200);
                setTimeout("document.getElementById('pbmain').style='width:100%';", 1450);
                setTimeout("window.location.href='web/';", 1550);
            }
        </script>
    </head>
    <body>
        <div class="mainbox">
            <img src="<?php echo $webroot?>/landchat_512.jpg" height="400" width="400"/>
            <p>正在加载LandChat...</p>
            <div class="progress"><div class="progress-bar" id="pbmain" style="width:0%"></div></div>
        </div>
        <script>loadlc();</script>
    </body>
</html>