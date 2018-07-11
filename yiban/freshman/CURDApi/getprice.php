<?php
	require('../classes/DBConnector.class.php');
	$goodstag=htmlentities($_GET['goodstag'],ENT_QUOTES);
	$connect=DBConnector::connect();
	$sql="SELECT price FROM prices WHERE goodstag='$goodstag'";
	$result=$connect->query($sql);
	$result=$result->fetch_object();
	echo json_encode($result->price);