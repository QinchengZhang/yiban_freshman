<?php
class Student{
	private $connect;
	private $api;
	private $_config=array(
		'ksh' => '',
		'xh'  => '',
		'xm'  => '',
		'xb' => '',
		'yb_userid' => '',
		'yb_username' => '',
		'regtime' => ''
	);
	/*
	函数名：构造函数
	函数作用：将YBOpenApi传给本类内api变量，设置时区
	*/
	function __construct($api){
		$this->connect=DBConnector::connect();
		$this->api=$api;
		date_default_timezone_set("Asia/Shanghai");
	}
	/*
	函数名：setKsh
	函数作用：给基础配置Ksh赋值
	*/
	public function setKsh($ksh){
		$this->_config['ksh']=$ksh;
	}
	/*
	函数名：setXh
	函数作用：给基础配置xh赋值
	*/
	public function setXh($xh){
		$this->_config['xh']=$xh;
	}
	/*
	函数名：setXm
	函数作用：给基础配置xm赋值
	*/
	public function setXm($xm){
		$this->_config['xm']=$xm;
	}
	/*
	函数名：setXb
	函数作用：给基础配置xb赋值
	*/
	public function setXb($xb){
		$this->_config['xb']=$xb;
	}
	/*
	函数名：setStuConfig
	函数作用：给基础配置ksh,xh,xm,xb赋值
	参数说明：array('ksh'=>data,'xh'=>data,'xm'=>data,'xb'=>data)
	*/
	public function setStuConfig($config){
		$this->_config['ksh']=$config['ksh'];
		$this->_config['xh']=$config['xh'];
		$this->_config['xm']=$config['xm'];
		$this->_config['xb']=$config['xb'];
	}
	/*
	函数名：setToken
	函数作用：给易班用户项配置access_token赋值
	*/
	public function setToken($token){
		$this->_config['access_token']=$token;
	}
	/*
	函数名：getYBConfig
	函数作用：通过易班接口获取yb_userid,yb_username并返回
	*/
	public function getYBConfig(){
		$obj=$this->api->request('user/me');
		if($obj['status']=='error'){
			throw new YBException($obj['info']['msgCN']);
		}else{
			//$this->_config['yb_userid']=$this->api->_config['token'];
			$this->_config['yb_userid']=$obj['info']['yb_userid'];
			$this->_config['yb_username']=$obj['info']['yb_username'];
			$this->_config['xb']=$obj['info']['yb_sex'];
		}
		return array('yb_userid' => $this->_config['yb_userid'],
					 'yb_username'  => $this->_config['yb_username'],
					 'xb'  => $this->_config['xb']
					);
	}
	/*
	函数名：getStuConfig
	函数作用：返回学生基本信息
	*/
	public function getStuConfig(){
		if(!empty($this->_config['ksh'])&&!empty($this->_config['xh'])){
			return array('ksh' => $this->_config['ksh'],
					 'xh'  => $this->_config['xh'],
					 'xm'  => $this->_config['xm'],
					 'xb'  => $this->_config['xb']
					);
		}else{
			$this->getStuConfigFromDB();
			return array('ksh' => $this->_config['ksh'],
					 'xh'  => $this->_config['xh'],
					 'xm'  => $this->_config['xm'],
					 'xb'  => $this->_config['xb']
					);
		}
	}
	/*
	函数名：submit
	函数作用：提交到数据库
	*/
	public function submit(){
		$this->_config['regtime']=date("Y-m-d h:i:s");
		$sql="INSERT INTO students (ksh,xh,xm,xb,yiban_userid,yiban_username,regtime) 
			  VALUES ('".$this->_config['ksh']."','".$this->_config['xh']."','".$this->_config['xm']."','".$this->_config['xb']."','".$this->_config['yb_userid']."','".$this->_config['yb_username']."','".$this->_config['regtime']."')";
		if($this->connect->query($sql)){
			return true;
		}else{
			return false;
		}

	}
	/*
	函数名：CheckRep
	函数作用：查询是否重复提交
	*/
	public function CheckRep(){
		$sql="SELECT ksh FROM students WHERE yiban_userid='".$this->_config['yb_userid']."'";
		$result=$this->connect->query($sql);
		return $result->num_rows==0?true:false;
	}
	/*
	函数名：getStuConfigFromDB
	函数作用：查看提交历史时从数据库调出内容
	*/
	private function getStuConfigFromDB(){
		$sql="SELECT ksh,xh,xm,xb FROM students WHERE yiban_userid='".$this->_config['yb_userid']."'";
		$result=$this->connect->query($sql);
		if ($result->num_rows > 0) {
    	// 输出数据
    	while($row = $result->fetch_assoc()) {
        	$this->_config['ksh']=$row['ksh'];
        	$this->_config['xh']=$row['xh'];
        	$this->_config['xm']=$row['xm'];
        	$this->_config['xb']=$row['xb'];
    	}
		} else {
    		throw new YBException('获取学生基本信息失败！');
		}
	}
}
