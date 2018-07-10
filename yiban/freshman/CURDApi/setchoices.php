<?php
	function checkDistinct($connect,$xh){
		$sql="SELECT * FROM stu_choices WHERE xh='$xh'";
		$result=$connect->query($sql);
		if($result->num_rows==0){
			return true;
		}
		else{
			return false;
		}
	}
	require('../classes/DBConnector.class.php');
	$bedding=htmlentities($_GET['bedding'],ENT_QUOTES);
	$quilt=htmlentities($_GET['quilt'],ENT_QUOTES);
	$puff=htmlentities($_GET['puff'],ENT_QUOTES);
	$mattress=htmlentities($_GET['mattress'],ENT_QUOTES);
	$stool=htmlentities($_GET['stool'],ENT_QUOTES);
	$pillow=htmlentities($_GET['pillow'],ENT_QUOTES);
	$comment=htmlentities($_GET['comment'],ENT_QUOTES);
	$size=htmlentities($_GET['size'],ENT_QUOTES);
	$xh=htmlentities($_GET['xh'],ENT_QUOTES);
	$connect=DBConnector::connect();
	if(checkDistinct($connect,$xh)){
		$sql="INSERT INTO stu_choices (xh,bedding,quilt,puff,mattress,stool,pillow,comment,size) VALUES ('$xh','$bedding','$quilt','$puff','$mattress','$stool','$pillow','$comment','$size')";
		if($connect->query($sql)){
			$result=array('status' => 'success','info' => array('msg' => '提交成功'));
		}else{
			$result=array('status' => 'error','info' => array('msg' => '提交失败'));
		}
	}else{
		$result=array('status' => 'error','info' => array('msg' => '重复提交'));
	}
	echo json_encode($result);