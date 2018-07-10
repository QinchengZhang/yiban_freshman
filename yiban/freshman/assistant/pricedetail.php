<?php
    function getPrice($goodstag){
        $url=$_SERVER['SERVER_NAME']."/yiban/freshman/CURDApi/getprice.php?goodstag=".$goodstag;
        $obj=YBOpenApi::QueryURL($url);
        return $obj;
    }
    /**
    * 包含SDK
    */
    require("../classes/yb-globals.inc.php");
    require("config.php");
    $prices=array('bedding' => '',
				  'quilt' => '',
				  'puff' => '',
				  'mattress' =>'',
				  'stool' => '',
				  'pillow' => '',
				  'clothing' => ''
					);
    foreach ($prices as $key => $value) {
   		$prices[$key]=getPrice($key);
    }
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
        <title style="color:black">物品价格详情</title>
        <script type="text/javascript">
        </script>
    </head>
    <body style="background-color:#FFFAFA" >
        <header>
                <h3 style="margin:15px;vertical-align: middle;text-align:center;font-size:30px"><a>物品价格详情</a></h3>
            </header>
        <div class="weui-form-preview">
            <div class="weui-form-preview__bd" style="color:black;">
            	<div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">床上三件套</label>
                    <span class="weui-form-preview__value"><?=$prices['bedding']?>元</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">被子</label>
                    <span class="weui-form-preview__value"><?=$prices['quilt']?>元</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">褥子</label>
                    <span class="weui-form-preview__value"><?=$prices['puff']?>元</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">床垫</label>
                    <span class="weui-form-preview__value"><?=$prices['mattress']?>元</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">马扎</label>
                    <span class="weui-form-preview__value"><?=$prices['stool']?>元</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">枕头</label>
                    <span class="weui-form-preview__value"><?=$prices['pillow']?>元</span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label">军训服</label>
                    <span class="weui-form-preview__value"><?=$prices['clothing']?>元</span>
                </div>
            </div>
            <div class="weui-form-preview__ft">
            	<a onclick="javascript:window.history.back()" class="weui-form-preview__btn weui-form-preview__btn_primary">返回</a>
                <a class="weui-form-preview__btn weui-form-preview__btn_primary" onclick="phone_fun('<?=$TelNumberList['YBKF']?>')">联系工作人员</a>
            </div>
            </div>
    </body>

</html>