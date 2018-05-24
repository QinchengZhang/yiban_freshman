<?php
$token = isset($token) ? $token : $_GET['token'];
if(!empty($_POST['ksh'])){
    $ksh=$_POST['ksh'];
    $xh=$_POST['xh'];
    $xm=$_POST['xm'];
    $xb=$_POST['gender'];
    $info=array(
    'ksh' => $ksh,
    'xh'  => $xh,
    'xm'  => $xm,
    'xb'  => $xb
);
//var_dump($info);
}
/**
 * 包含SDK
 */
require("../classes/yb-globals.inc.php");
// 配置文件
require_once 'config.php';

//初始化配置信息，并获取token
$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$api->bind($token);
$stu=new Student($api);
$stu->getYBConfig();
$stu->setStuConfig($info);
if($stu->submit()){
    $url = "success.php";
?>
    <script language='javascript' type='text/javascript'>window.location.href='<?=$url?>'</script>
<?php 
}else{
    $url = "warning.php";
    ?>
   <script language='javascript' type='text/javascript'>window.location.href='<?=$url?>'</script>
   <?php
}
?>