<?php 
require_once 'config.php';
$token=htmlentities($_GET['token'],ENT_QUOTES);
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
    </head>
    <body style="background-color:#FFFAFA" >
        <header>
            <br>
                <h3 class="weui-msg__title" style="vertical-align: middle;text-align:center;font-size:30px"><a>提交成功！</a></h3>
                 <h3 class="weui-msg__desc" style="vertical-align: middle;text-align:center;font-size:15px"><a>您现在可以通过点击查看个人信息<font color="red">查看刚才提交的信息及宿舍号、辅导员联系方式</font>等，如果有误请联系工作人员修改</a></h3>
            </header>
            <div class="weui-msg__opr-area">
            <p class="weui-btn-area">
                <a onclick="javascript:window.location.href='browseinfo.php?token=<?=$token?>'" class="weui-btn weui-btn_primary">查看个人信息</a>
                <a onclick="phone_fun('<?=$TelNumberList['YBKF']?>')" class="weui-btn weui-btn_default">联系工作人员</a>
            </p>
        </div>
    </body>

</html>