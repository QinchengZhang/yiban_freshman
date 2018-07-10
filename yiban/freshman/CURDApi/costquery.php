<?php
	require('../classes/DBConnector.class.php');
	$bedding=htmlentities($_GET['bedding'],ENT_QUOTES);
	$quilt=htmlentities($_GET['quilt'],ENT_QUOTES);
	$puff=htmlentities($_GET['puff'],ENT_QUOTES);
	$mattress=htmlentities($_GET['mattress'],ENT_QUOTES);
	$stool=htmlentities($_GET['stool'],ENT_QUOTES);
	$pillow=htmlentities($_GET['pillow'],ENT_QUOTES);
	$arr=array('clothing');
	if($bedding=='1')
		array_push($arr, 'bedding');
	if($quilt=='1')
		array_push($arr, 'quilt');
	if($puff=='1')
		array_push($arr, 'puff');
	if($mattress=='1')
		array_push($arr, 'mattress');
	if($stool=='1')
		array_push($arr, 'stool');
	if($pillow=='1')
		array_push($arr, 'pillow');
	$connect=DBConnector::connect();
	$sql="SELECT SUM(price) FROM prices WHERE goodstag IN (";
	foreach($arr as $e)
		$sql.="'".$e."',";
	$sql.="'')";
    $result=$connect->query($sql);
    $result=$result->fetch_all();
    echo json_encode($result[0][0]);