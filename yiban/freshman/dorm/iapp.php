<?php
    /**
     * 轻应用授权
     * 
     */
    

    /**
     * 包含SDK
     */
    require("../classes/yb-globals.inc.php");

    //配置文件
    require_once 'config.php';
    
    //初始化
    $api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
    $iapp  = $api->getIApp();
    
    try {
       //轻应用获取access_token，未授权则跳转至授权页面
       $info = $iapp->perform();
    } catch (YBException $ex) {
       echo $ex->getMessage();
    }
    
    
    $token = $info['visit_oauth']['access_token'];//轻应用获取的token
    
    
?>
<!DOCTYPE html>
<html style="height:100%;">

	<head style="background-color:#FFFAFA" >
		<meta charset="utf-8">
		<meta content="width=device-width,user-scalable=no" name="viewport">
		<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
		<script type="text/javascript" src="../js/navigator.js"></script>
    	<script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../style/dist/style/weui.css">
		<link rel="stylesheet" type="text/css" href="../style/dist/example/example.css">
		<title style="color:black">新生助手</title>
		<script type="text/javascript">
    		 function tabbar_onclick(index){
                closeMenu();
    		 	var elementname=new Array("tabbar_1","tabbar_2","tabbar_3");
    		 	for(i in elementname){
    		 		var element=document.getElementById(elementname[i]);
    		 		element.className="weui-tabbar__item";
    		 	}
    		 	var element=document.getElementById(elementname[index-1]);
    		 	element.className="weui-tabbar__item weui-bar__item_on";
    		 	var Myframe=document.getElementById("Myframe");
    		 	switch(index){
    		 		case 1: Myframe.src="dormquery.php?token=<?=$token?>";
    		 				break;
    		 		case 2: Myframe.src="preorder.php?token=<?=$token?>";
    		 				break;
    		 		case 3: Myframe.src="browseinfo.php?token=<?=$token?>";
    		 				break;
    		 	}
    		 }
    		 function checkToken(){
    		 	var flag=new Boolean(<?php echo isset($token)&&$token?"true":"false"; ?>);
    		 	var toast=document.getElementById("toast_success");
    		 	//alert(toast.style.display);
    		 		if(flag){
    		 				toast.style.visibility = 'visible';
            				setTimeout(function(){toast.style.visibility='hidden'}, 1000);
            			}else{
            				var toast_type=document.getElementById("toast_type");
    		 				var toast_text=document.getElementById("toast_text");
    		 				toast_type.className="weui-loading weui-icon_toast";
    		 				toast_text.inneText="获取用户信息失败，请重试！";
    		 				toast.style.visibility = 'visible';
            				setTimeout(function(){toast.style.visibility='hidden'}, 1000);
            			}
    		 		
    		 }
    		 function getmap(){
                gethtml5location_fun();
    		 	var Myframe=document.getElementById("Myframe");
    		 	Myframe.src="map.php?langitude="+getCookie('langitude')+"&latitude="+getCookie('latitude');
    		 }
             function getScan(){
                encode_fun();
                if(getCookie('scanresult')!=''){
                alert(getCookie('scanresult'));
                delCookie('scanresult');
                }
                
             }
             function getMenu(){
                var visibility=document.getElementById("menu").style.visibility;
                if(visibility == 'hidden'){
                    document.getElementById("bg").style.visibility ='visible';
                    document.getElementById("menu").style.visibility = 'visible';
                }else{
                    document.getElementById("bg").style.visibility = 'hidden';
                    document.getElementById("menu").style.visibility = 'hidden';
                }
             }
             function closeMenu(){
                document.getElementById("bg").style.visibility = 'hidden';
                document.getElementById("menu").style.visibility = 'hidden';
                document.getElementById("info").style.visibility = 'hidden';
             }
             function gethelp(){
                var Myframe=document.getElementById("Myframe");
                Myframe.src="help.php";
             }
             function developerinfo(){
                var visibility=document.getElementById("info").style.visibility;
                if(visibility == 'hidden'){
                    document.getElementById("bg").style.visibility ='visible';
                    document.getElementById("info").style.visibility = 'visible';
                }else{
                    document.getElementById("bg").style.visibility = 'hidden';
                    document.getElementById("info").style.visibility = 'hidden';
                }
             }
		</script>
		<style type="text/css">
			.tabbar_button{
				outline:none;
				display: inline-block;
				position: relative;
				border: 0px;
				background-color: transparent;
			}
		</style>
	</head>

	<body style="width:100%;height:100%;background-color:#FFFAFA" onload="checkToken()" >
        <div onclick="closeMenu()" id="bg" style="z-index: 100;width: 100%;height: 100%;position:absolute;left:0;top:0;visibility: hidden;"></div>
        <div id='scanresult' style="visibility: hidden;"></div>
		<div id="toast_success" style="visibility:hidden;">
        	<div class="weui-mask_transparent"></div>
        	<div class="weui-toast">
            <i id="toast_type" class="weui-icon-success-no-circle weui-icon_toast"></i>
            <p id="toast_text" class="weui-toast__content">获取用户信息成功!</p>
        	</div>
    	</div>
		<div class="page__bd" style="height: 100%;">
			<div class="weui-tab" >
    			<div class="weui-navbar" style="min-height:50px;height:8%;position:fixed;top:0px;" >
    				<div onclick="developerinfo()" class="weui-navbar__item"  style="flex-grow:1;" >
    					<img src="../style/cdmc.png" width="30" height="30" style="vertical-align: middle;"/>
                        <div id="info" style="z-index:101;visibility: hidden;"  class="weui-navbar__menu-content-info">
                            <div class="weui-cell">
                                    Contributer:ZQC
                            </div>
                            <div class="weui-cell">
                                    Department:BME
                            </div>
                            <div class="weui-cell">
                                    Copyright © <?=date("Y")?> ZQC
                            </div>
                        </div>
    				</div>
                <div id="test" class="weui-navbar__item"  onclick="tabbar_onclick(4)" style="flex-grow:3;">
                	<div>新生助手</div>
                </div>
                <div class="weui-navbar__menu"  style="flex-grow:1;" onclick="getMenu()">
    					<img src="../style/ico/menu.svg" width="25" height="25" style="vertical-align: middle;"/>
                        <div id="menu" style="z-index:101;visibility: hidden;"  class="weui-navbar__menu-content">
                            <div  onclick="getScan()"  class="weui-cell">
                                    扫一扫
                            </div>
                            <div onclick="gethelp()" class="weui-cell">
                                    帮助
                            </div>
                        </div>
    				</div>
            </div>
            	<iframe id="Myframe" src="preorder.php?token=<?=$token?>" style="bottom:8%;top:8%;overflow-y:visible;border:0px;height:84%;position:fixed;width:100%;">
            </iframe>
            <div style="min-height:55px;height:8%;position:fixed;bottom: 0px;" class="weui-tabbar">
                <a id="tabbar_1" class="weui-tabbar__item">
                    <button onclick="tabbar_onclick(1)" class="tabbar_button">
                        <img src="../style/ico/check-circle.svg" alt="" class="weui-tabbar__icon">
                        <p class="weui-tabbar__label">宿舍查询</p>
                    </button>
                    
                </a>
                <a id="tabbar_2" class="weui-tabbar__item weui-bar__item_on">
                    <button onclick="tabbar_onclick(2)" class="tabbar_button">
                        <img src="../style/ico/navigation.svg" alt="" class="weui-tabbar__icon">
                        <p class="weui-tabbar__label">被服预定</p>
                    </button>
                    
                </a>
                <a id="tabbar_3" class="weui-tabbar__item">
                    <button onclick="tabbar_onclick(3)" class="tabbar_button">
                        <img src="../style/ico/bookmark.svg" alt="" class="weui-tabbar__icon">
                        <p class="weui-tabbar__label">个人信息</p>
                    </button>
                    
                </a>
            </div>
        </div>
    </div>
	</body>

</html>