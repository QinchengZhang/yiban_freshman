<?php
    $langitude=htmlentities($_GET['langitude'],ENT_QUOTES);
    $latitude=htmlentities($_GET['latitude'],ENT_QUOTES);
    $labellatitude=$latitude-0.0002;
    $labellangitude=$langitude-0.0002;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="高德地图,DIY地图,高德地图生成器">
    <meta name="description" content="高德地图，DIY地图，自己制作地图，生成自己的高德地图">
    <title>高德地图 - DIY我的地图</title>
    <style>
        body { margin: 0; font: 13px/1.5 "Microsoft YaHei", "Helvetica Neue", "Sans-Serif"; min-height: 960px; min-width: 600px; }
        .my-map { margin: 0 auto; width: 600px; height: 600px; }
        .my-map .icon { background: url(http://lbs.amap.com/console/public/show/marker.png) no-repeat; }
        .my-map .icon-cir { height: 31px; width: 28px; }
        .my-map .icon-cir-red { background-position: -11px -5px; }
        .my-map .icon-flg { height: 32px; width: 29px; }
        .my-map .icon-flg-blue { background-position: -65px -55px; }
        .my-map .icon-twig { height: 27px; width: 30px; }
        .my-map .icon-twig-yellow { background-position: -187px -105px; }
        .amap-container{height: 100%;}
    </style>
</head>
<body>
    <div id="wrap" class="my-map">
        <div id="mapContainer"></div>
    </div>
    <script src="//webapi.amap.com/maps?v=1.3&key=8325164e247e15eea68b59e89200988b"></script>
    <script>
    !function(){
        var infoWindow, map, level = 17,
            center = {lng: 117.956835, lat: 41.034128},
            features = [{type: "Marker", name: "学生6号公寓", desc: "男生公寓及辅导员办公室", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.95435, lat: 41.0353}},
                {type: "Marker", name: "学生7号公寓", desc: "女生公寓", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.955336, lat: 41.035385}},
                {type: "Marker", name: "学生8号公寓", desc: "男生公寓", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.956207, lat: 41.035785}},
                {type: "Marker", name: "学生5号公寓", desc: "女生公寓", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.954173, lat: 41.034341}},
                {type: "Marker", name: "学生4号公寓", desc: "女生公寓", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.954803, lat: 41.034834}},
                {type: "Marker", name: "学生2号公寓", desc: "女生公寓", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.956269, lat: 41.035194}},
                {type: "Marker", name: "学生1号公寓", desc: "女生公寓", color: "red", icon: "cir", offset: {x: -9, y: -31}, lnglat: {lng: 117.956862, lat: 41.034782}},
                {type: "Marker", name: "大学生活动中心", desc: "购买军训装备", color: "blue", icon: "flg", offset: {x: -12, y: -26}, lnglat: {lng: 117.956756, lat: 41.034126}},
                {type: "Marker", name: "新生报到地点", desc: "报到地点", color: "yellow", icon: "twig", offset: {x: -13, y: -26}, lnglat: {lng: 117.957858, lat: 41.035769}}];

        function loadFeatures(){
            for(var feature, data, i = 0, len = features.length, j, jl, path; i < len; i++){
                data = features[i];
                switch(data.type){
                    case "Marker":
                        feature = new AMap.Marker({ map: map, position: new AMap.LngLat(data.lnglat.lng, data.lnglat.lat),
                            zIndex: 3, extData: data, offset: new AMap.Pixel(data.offset.x, data.offset.y), title: data.name,
                            content: '<div class="icon icon-' + data.icon + ' icon-'+ data.icon +'-' + data.color +'"></div>' });
                        break;
                    case "Polyline":
                        for(j = 0, jl = data.lnglat.length, path = []; j < jl; j++){
                            path.push(new AMap.LngLat(data.lnglat[j].lng, data.lnglat[j].lat));
                        }
                        feature = new AMap.Polyline({ map: map, path: path, extData: data, zIndex: 2,
                            strokeWeight: data.strokeWeight, strokeColor: data.strokeColor, strokeOpacity: data.strokeOpacity });
                        break;
                    case "Polygon":
                        for(j = 0, jl = data.lnglat.length, path = []; j < jl; j++){
                            path.push(new AMap.LngLat(data.lnglat[j].lng, data.lnglat[j].lat));
                        }
                        feature = new AMap.Polygon({ map: map, path: path, extData: data, zIndex: 1,
                            strokeWeight: data.strokeWeight, strokeColor: data.strokeColor, strokeOpacity: data.strokeOpacity,
                            fillColor: data.fillColor, fillOpacity: data.fillOpacity });
                        break;
                    default: feature = null;
                }
                if(feature){ AMap.event.addListener(feature, "click", mapFeatureClick); }
            }
        }

        function mapFeatureClick(e){
            if(!infoWindow){ infoWindow = new AMap.InfoWindow({autoMove: true}); }
            var extData = e.target.getExtData();
            infoWindow.setContent("<h5>" + extData.name + "</h5><div>" + extData.desc + "</div>");
            infoWindow.open(map, e.lnglat);
        }

        map = new AMap.Map("mapContainer", {center: new AMap.LngLat(center.lng, center.lat), level: level});
        new AMap.TileLayer.RoadNet({map: map, zIndex: 2});
        loadFeatures();
        marker = new AMap.Marker({
            position: [<?=$langitude?>,<?=$latitude?>],
            title: '您的位置',
            map: map,

        });
        label = new AMap.Marker({
            position: [<?=$labellangitude?>,<?=$labellatitude?>],
            map: map,
            content: '<i>您的位置</i>'
        });
        
        map.on('complete', function(){
            map.plugin(["AMap.Scale"], function(){
                map.addControl(new AMap.Scale);
            }); 
        })
        
    }();
    </script>
</body>
</html>