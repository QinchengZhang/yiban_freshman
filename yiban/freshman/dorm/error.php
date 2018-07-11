<?php 
require_once 'config.php';
$info=htmlentities($_GET['info'],ENT_QUOTES);
$msg=htmlentities($_GET['Msg'],ENT_QUOTES);
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
        <script type="text/javascript">
        </script>
    </head>
    <body style="background-color:#FFFAFA" >
        <header>
            <br>
                <h3 class="weui-msg__title" style="vertical-align: middle;text-align:center;font-size:30px"><a><font color="red"><?=$info?></font></a></h3>
                 <h3 class="weui-msg__desc" style="vertical-align: middle;text-align:center;font-size:15px"><a>失败原因:<?=$msg?></a></h3>
            </header>
            <div class="weui-msg__opr-area">
            <p class="weui-btn-area">
                <a onclick="javascript:window.history.back()" class="weui-btn weui-btn_primary">返回</a>
                <a onclick="phone_fun('<?=$TelNumberList['YBKF']?>')" class="weui-btn weui-btn_default">联系工作人员</a>
            </p>
        </div>
    </body>
</html>