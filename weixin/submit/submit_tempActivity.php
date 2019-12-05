<?php
include('../config/dbconnect.php');

$date=date('Y-m-d h:i:s');
$activityNo=$_REQUEST['activityNo'];
$activityName=$_REQUEST['activityName'];
$WXName=$_REQUEST['WXName'];
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$address=$_REQUEST['address'];
$friend1=$_REQUEST['friend1'];
$friend2=$_REQUEST['friend2'];
$friend3=$_REQUEST['friend3'];

$sql = "insert into WEIXIN2_tempActivity values('".$date."','".$activityNo."','".$activityName."','".$WXName."','".$name."','".$phone."','".$address."','".$friend1."','".$friend2."','".$friend3."')";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
if (mysql_affected_rows()>0)
{
	echo '您的信息已提交成功，我们会尽快为您发送奖品，谢谢！';
}
else{
	echo "<script language='JavaScript'>alert('很抱歉，您的信息未提交成功，请您返回后重新填写！');location.replace('content.php?content=tempActivity')</script>";
	exit;
}
mysql_close();
?>