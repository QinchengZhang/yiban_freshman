<?php 
require 'config.php';

$appUrl = isset($config['CallBack'])?$config['CallBack']:'javaScript:;';

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title> 易班承德医学院新生报到指南</title>
	<style>	* { line-height: 32px; } </style>
</head>
<body onload="javascript:window.location.href='<?=$appUrl?>'">
</body>
</html>