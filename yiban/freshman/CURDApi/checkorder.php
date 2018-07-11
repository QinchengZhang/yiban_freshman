<?php
function checkChoices($connect,$xh){
		$sql="SELECT * FROM stu_choices WHERE xh='$xh'";
		$result=$connect->query($sql);
		if($result->num_rows!=0){
			return true;
		}
		else{
			return false;
		}
	}
	require('../classes/DBConnector.class.php');
	$xh=htmlentities($_GET['xh'],ENT_QUOTES);
	$connect=DBConnector::connect();
	if(checkChoices($connect,$xh)){
		$result=array('status' => 'success','info' => array('msg' => '存在预订信息'));
	}else{
		$result=array('status' => 'error','info' => array('msg' => '不存在预订信息'));
	}
	echo json_encode($result);