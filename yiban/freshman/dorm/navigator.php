<?php
	$langitude=htmlentities($_GET['langitude'],ENT_QUOTES);
	$latitude=htmlentities($_GET['latitude'],ENT_QUOTES);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>步行路径规划</title>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
        <script type="text/javascript" src="../js/navigator.js"></script>
        <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/dist/style/weui.css">
        <link rel="stylesheet" type="text/css" href="../style/dist/example/example.css">
    <link rel="stylesheet" href="https://cache.amap.com/lbs/static/main.css"/>
    <script type="text/javascript"
            src="https://webapi.amap.com/maps?v=1.4.2&key=2249bb2128d7c5e601e58c5896674036"></script>
    <style type="text/css">
         #panel {
            position: fixed;
            background-color: white;
            max-height: 100%;
            overflow-y: auto;
            top: 10px;
            right: 10px;
            width: 280px;
        }
    </style>
    <script type="text/javascript">
        function selectdirection(){
            document.getElementById("selectdirection").style.visibility = 'visible';
        }
        function go(direction){
            var to;
            switch (direction) {
                case 1: to=[117.957918,41.035858];
                        break;
                case 2: to=[117.956554,41.034308];
                        break;
                case 3: to=[117.95612,41.035765];
                        break;
                case 4: to=[117.954317,41.03536];
                        break;
                case 5: to=[117.956828,41.034846];
                        break;
                case 6: to=[117.956356,41.035259];
                        break;
                case 7: to=[117.954081,41.034316];
                        break;
            }
                //基本地图加载
            var map = new AMap.Map("mapContainer", {
                        resizeEnable: true,
                        center:[<?php echo $langitude;?>,<?php echo $latitude;?>],//地图中心点
                        zoom: 13 //地图显示的缩放级别
            });
            AMap.plugin(['AMap.ToolBar','AMap.Scale','AMap.OverView'],
            function(){
                        //map.addControl(new AMap.ToolBar());

                        map.addControl(new AMap.Scale());

                        //map.addControl(new AMap.OverView({isOpen:true}));
            });
            //步行导航
            AMap.service(["AMap.Walking"], function() {
                var MWalk = new AMap.Walking({
                    map: map,
                    panel: "panel"
                }); //构造路线导航类
                //根据起终点坐标规划步行路线
                //MWalk.search([116.379028,39.865042], [116.427281,39.903719], function(status, result){
                MWalk.search([<?php echo $langitude;?>,<?php echo $latitude;?>], to, function(status, result) {

                });
            });
                document.getElementById("selectdirection").style.visibility = 'hidden';
        }
    </script>
</head>
<body onload="selectdirection()">
<div class="weui-skin_android" id="selectdirection" style="visibility: hidden;">
        <div class="weui-mask"></div>
        <div class="weui-actionsheet">
            
            <div class="weui-actionsheet__menu">
                <div style="color: #ffffff;background-color: #0083FF;" class="weui-actionsheet__cell">
                <p class="weui-actionsheet__title-text" style="text-align: center;">您要去哪？</p>
            </div>
                <div onclick="go(1);" class="weui-actionsheet__cell">新生报到地点</div>
                <div onclick="go(2);"class="weui-actionsheet__cell">大学生活动中心</div>
                <div onclick="go(3);" class="weui-actionsheet__cell">八号学生公寓</div>
                <div onclick="go(4);" class="weui-actionsheet__cell">六号学生公寓</div>
                <div onclick="go(5);" class="weui-actionsheet__cell">一号学生公寓</div>
                <div onclick="go(6);" class="weui-actionsheet__cell">二号学生公寓</div>
                <div onclick="go(7);" class="weui-actionsheet__cell">五号学生公寓</div>
            </div>
        </div>
    </div>
<div id="mapContainer" style="height:100%"></div>
<div id="panel">
</div>

        
  <script type="text/javascript" src="https://webapi.amap.com/demos/js/liteToolbar.js"></script>
  
</body>
</html>