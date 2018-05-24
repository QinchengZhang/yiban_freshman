<?php 
require_once 'config.php';
$token=$_GET['token'];
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
                <h3 class="weui-msg__title" style="vertical-align: middle;text-align:center;font-size:30px"><a>请勿重复登记！</a></h3>
                 <h3 class="weui-msg__desc" style="vertical-align: middle;text-align:center;font-size:15px"><a>您之前已经进行过信息登记，若非您本人操作或信息填写有误请联系工作人员</a></h3>
            </header>
            <div class="weui-msg__opr-area">
            <p class="weui-btn-area">
                <a onclick="javascript:window.location.href='browseinfo.php?token=<?=$token?>'" class="weui-btn weui-btn_primary">浏览提交历史</a>
                <a onclick="phone_fun('<?=$config['PhoneNumber']?>')" class="weui-btn weui-btn_default">联系工作人员</a>
            </p>
        </div>
    </body>
</html>