<?php
    $token = isset($token) ? $token : htmlentities($_GET['token'],ENT_QUOTES);
    /**
    * 包含SDK
    */
    require("../classes/yb-globals.inc.php");
    // 配置文件
    require_once 'config.php';
    $api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
    $api->bind($token);
    $stu=new Student($api);
    $StuInfo=$stu->showInfo();
?>
<!DOCTYPE html>
<html>

    <head style="background-color:#FFFAFA" >
        <meta charset="utf-8">
        <meta content="width=device-width,user-scalable=no" name="viewport">
        <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
        <script type="text/javascript" src="../js/navigator.js"></script>
        <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/dist/style/weui.css">
        <link rel="stylesheet" type="text/css" href="../style/dist/example/example.css">
        <title style="color:black">宿舍外景查看</title>
        <script type="text/javascript">
             function navigate(){
             	gethtml5location_fun();
             	window.location.href='navigator.php?dorm_num=<?=$StuInfo['dorm_num']?>';
             }
        </script>
    </head>
    <body style="background-color:#FFFAFA" >
        <header>
                <h3 style="margin:15px;vertical-align: middle;text-align:center;font-size:30px"><a>宿舍外景查看</a></h3>
            </header>
        <div style="text-align: center;">
        	<img class="weui-photo" style="margin-left: 10%;margin-right: 10%;margin-bottom: 20px;" src="./dorm_photo/dorm_<?=$StuInfo['dorm_num']?>.jpg" width="80%">
        </div>
        <div class="weui-form-preview">
            <div class="weui-form-preview__hd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">宿舍楼</label>
                    <em class="weui-form-preview__value"><?=$StuInfo['dorm_num']?>号</em>
                </div>
            </div>
            <div class="weui-form-preview__bd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">宿舍号</label>
                    <span class="weui-form-preview__value"><?=$StuInfo['dorm']?></span>
                </div>
            </div>
            <div class="weui-form-preview__ft">
                <a class="weui-form-preview__btn weui-form-preview__btn_primary" onclick="navigate()">查看地图</a>
            </div>
    </body>

</html>