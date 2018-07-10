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
	$stu->getYBConfig();
	if(!$stu->CheckRep()){
		$url = "warning.php?token=".$token;
		?>
		<script language='javascript' type='text/javascript'>window.location.href='<?=$url?>'</script>
<?php
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
		<title style="color:black">信息登记</title>
		<script type="text/javascript">
			function CheckLocation(){
							gethtml5location_fun();
							var langitude=parseFloat(getCookie('langitude'));
							var latitude=parseFloat(getCookie('latitude'));
							if(langitude<117.951939||langitude>117.960608||latitude<41.028775||latitude>41.037548){
								return false;
							}else{
								return true;
							}
			}
			function CheckScan(){
							encode_fun();
							if(getCookie('scanresult')=="yiban_scan_result:cdmccheck"){
								delCookie('scanresult');
								return true;
							}else{
								delCookie('scanresult');
								return false;
							}
			}
			function CheckandSubmit(method){
					switch(method){
						case 1: if(!CheckLocation()){
								alert("请在校园内进行信息登记或尝试扫二维码进行提交");
								return;
								}
								break;
						case 2: if(!CheckScan()){
								alert("请扫报到地点签到用二维码进行提交，若您在校园内请点击定位提交");
								return;
								}
								break;
					}
				var ksh=document.getElementById("ksh").value;
				var xh=document.getElementById("xh").value;
				var xm=document.getElementById("xm").value;
				var toptips=document.getElementById("toptips");
				if(ksh.length!=14){
					//toptips.innrText="请输入14位考生号";
					toptips.style.visibility = 'visible';
					
					alert("请输入14位考生号");
					return;
				}else if (xh.length!=12) {
					alert("请输入12位学号");
					return;
				}else if(xm.length==0){
					alert("请输入姓名(与报到单姓名一致)");
				}else{
					document.getElementById("form").submit();
				}
			}
		</script>
	</head>
	<body style="background-color:#FFFAFA" >
		<div id="toptips" class="weui-toptips weui-toptips_warn js_tooltips" style="visibility: visible;">错误提示</div>
		<header>
				<h3 style="vertical-align: middle;text-align:center;font-size:30px"><a>基本信息登记表</a></h3>
			</header>
		<form method="post" action="update.php?token=<?=$token?>" class="weui-cells weui-cells_form" id="form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">考生号</label></div>
                <div class="weui-cell__bd">
                    <input id="ksh" name="ksh" class="weui-input" type="number" required pattern="[0-9]{14}" title="14位考生号" placeholder="请输入14位考生号"/>
                </div>
            </div>
             <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">学号</label></div>
                <div class="weui-cell__bd">
                    <input id="xh" name="xh" class="weui-input" type="number" required pattern="[0-9]{12}" title="12位学号" placeholder="请输入12位学号"/>
                </div>
            </div>
             <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
                <div class="weui-cell__bd">
                    <input id="xm" name="xm" class="weui-input" type="text" required placeholder="请输入姓名"/>
                </div>
            </div>
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">性别</label>
                </div>
                <div class="weui-cell__bd">
                    <select class="weui-select" id="gender" name="gender">
                        <option value="M">男</option>
                        <option value="F">女</option>
                    </select>
                </div>
            </div>
            <button type="button" class="weui-btn weui-btn_primary" onclick="CheckandSubmit(1)" style="bottom: 0px;">定位提交</button>
            <button type="button" class="weui-btn weui-btn_primary" onclick="CheckandSubmit(2)" style="bottom: 0px;">扫码提交</button>
        </form>
	</body>

</html>