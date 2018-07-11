<?php
class DBConnector {
	private static $hostname='112.74.210.47';
	private static $port=3306;
	private static $username="yiban";
	private static $password="32fhh5asd";
	private $connect;
	private static $DBName='yiban';
	/*
	 * 连接mysql数据库
	 */
	public static function connect(){
		$connect=new mysqli(self::$hostname.':'.self::$port,self::$username,self::$password,self::$DBName);
		$connect->set_charset("utf-8");
		$connect->query("SET NAMES UTF8");
		return $connect;
	}
}