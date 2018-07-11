<?php
error_reporting(E_ALL ^ E_NOTICE);
$choices=array(
            'xh' => '',
            'bedding' => '',
            'quilt' => '',
            'puff' => '',
            'mattress' => '',
            'stool' => '',
            'pillow' => '',
            'size' => '',
            'comment' => '',
            );
if(!$_POST['bedding'])
    $choices['bedding']=false;
else
    $choices['bedding']=true;
if(!$_POST['quilt'])
    $choices['quilt']=false;
else
    $choices['quilt']=true;
if(!$_POST['puff'])
    $choices['puff']=false;
else
    $choices['puff']=true;
if(!$_POST['mattress'])
    $choices['mattress']=false;
else
    $choices['mattress']=true;
if(!$_POST['stool'])
    $choices['stool']=false;
else
    $choices['stool']=true;
if(!$_POST['pillow'])
    $choices['pillow']=false;
else
    $choices['pillow']=true;
$choices['size']=$_POST['size'];
$choices['comment']=$_POST['comment'];
/**
 * 包含SDK
 */
require("../classes/yb-globals.inc.php");
// 配置文件
require_once 'config.php';
$token = isset($token) ? $token : htmlentities($_GET['token'],ENT_QUOTES);
//初始化配置信息，并获取token
$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
$api->bind($token);
$stu=new Student($api);
$stuInfo=$stu->showInfo();
$choices['xh']=$stuInfo['xh'];
$result=$stu->setStuChoices($choices);
if($result['status']=='success'){
    $url = "success.php?token=".$token;
    $param=array('access_token' => $token,
                 'to_yb_uid' => $stuInfo['yb_userid'],
                 'content' => $stuInfo['xm'].'同学,您的预订单提交成功!',
     );
    $api->QueryURL('https://openapi.yiban.cn/msg/letter',$param,true);
?>
    <script language='javascript' type='text/javascript'>window.location.href='<?=$url?>'</script>
<?php 
}else{
         $url = "error.php?info=提交失败&Msg=".$result['info']['msg'];
    ?>
   <script language='javascript' type='text/javascript'>window.location.href='<?=$url?>'</script>
   <?php
}