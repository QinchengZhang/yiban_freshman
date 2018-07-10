<?php
	require('../classes/DBConnector.class.php');
	$xh=htmlentities($_GET['xh'],ENT_QUOTES);
	$connect=DBConnector::connect();
	$sql="SELECT dorm_num,dorm FROM stu_dorm WHERE xh='$xh'";
    $result=$connect->query($sql);
    if($result){
    	if($result->num_rows!=0){
    		$result=$result->fetch_object();
    		$result=array('status' => 'success',
    				  	'info' => array('dorm_num' => $result->dorm_num,
    				  				  	'dorm' => $result->dorm,
    				  	),
    				);
    	}else{
    		$result=array('status' => 'error',
    				  'info' => array('msg' => '未找到该学号对应信息'),
    	);
    	}
    }else{
    	$result=array('status' => 'error',
    				  'info' => array('msg' => '查询失败'),
    	);
    }
    echo json_encode($result);