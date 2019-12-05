<?php
include('../config/dbconnect.php');

$date=date('Y-m-d h:i:s');
$company=$_REQUEST['company'];
$companyType=$_REQUEST['companyType'];
$address=$_REQUEST['address'];
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$mail=$_REQUEST['mail'];
$salesChannel=isset($_REQUEST['salesChannel'])?$_REQUEST['salesChannel']:"";
$post=isset($_REQUEST['post'])?$_REQUEST['post']:"";

$sql = "insert into WEIXIN2_vip values('".$date."','".$company."','".$companyType."','".$address."','".$name."','".$phone."','".$mail."','".$salesChannel."','".$post."')";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
if (mysql_affected_rows()>0)
{
	echo '您的信息已成功提交，我们审核后会尽快发给您VIP账号及密码！请注意关注您的手机短信或电子邮件！谢谢！';
}
else{
	echo "<script language='JavaScript'>alert('很抱歉，您的信息未提交成功，请您返回后重新填写！');location.replace('content.php?content=vip')</script>";
	exit;
}
mysql_close();
?>