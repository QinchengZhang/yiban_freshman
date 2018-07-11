<?php 
require_once 'config.php';
?>
<html>

	<head style="background-color:#FFFAFA" >
		<meta charset="utf-8">
		<meta content="width=device-width,user-scalable=no" name="viewport">
		<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
		<script type="text/javascript" src="../js/navigator.js"></script>
    	<script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../style/dist/style/weui.css">
		<link rel="stylesheet" type="text/css" href="../style/dist/example/example.css">
		<title style="color:black">信息登记</title>
		<script type="text/javascript">
    		
		</script>
	</head>
	<body style="background-color:#FFFAFA" >
		<br>
            <h3 style="vertical-align: middle;text-align:center;font-size:30px"><a>各部门电话</a></h3>
				<div class="weui-cells">
					<a class="weui-cell weui-cell_access" href="javascript:phone_fun('<?=$TelNumberList['YBKF']?>');">
					<div class="weui-cell__bd">
					<p>易班客服</p>
					</div>
					<div class="weui-cell__ft">
					</div>
					</a>
					<a class="weui-cell weui-cell_access" href="javascript:phone_fun('<?=$TelNumberList['XSC']?>');">
					<div class="weui-cell__bd">
					<p>学生处</p>
					</div>
					<div class="weui-cell__ft">
					</div>
					</a>
					<a class="weui-cell weui-cell_access" href="javascript:phone_fun('<?=$TelNumberList['YB']?>');">
					<div class="weui-cell__bd">
					<p>学院办公室</p>
					</div>
					<div class="weui-cell__ft">
					</div>
					</a>
					<a class="weui-cell weui-cell_access" href="javascript:phone_fun('<?=$TelNumberList['SGK']?>');">
					<div class="weui-cell__bd">
					<p>宿舍管理科</p>
					</div>
					<div class="weui-cell__ft">
					</div>
					</a>
					<a class="weui-cell weui-cell_access" href="javascript:phone_fun('<?=$TelNumberList['AQGZC']?>');">
					<div class="weui-cell__bd">
					<p>安全工作处</p>
					</div>
					<div class="weui-cell__ft">
					</div>
					</a>
				</div>
					

	</body>

</html>