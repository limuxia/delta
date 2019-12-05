<?php
include('../config/dbconnect.php');

$date=date('Y-m-d h:i:s');
$WXName=$_REQUEST['WXName'];
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$mail=$_REQUEST['mail'];
$photo=$_FILES['photo'];
$photoPath='';
$storePath="upload/";
$storeFileName='';
$fileMaxSize=1000000;	//最大上传大小1000K
$fileTypes=array(
	'image/jpg',
	'image/jpeg',
	'image/pjpeg',
	'image/png'
);

if (in_array($photo["type"],$fileTypes) && $photo["size"] < $fileMaxSize)
{
	if ($photo["error"] > 0)
	{
    	echo "<script language='JavaScript'>alert('获取文件出错，请您返回后重新上传！/n/r".$photo["error"]."');location.replace('content.php?content=activity')</script>";
    	exit;
    }
  	else
    {
    	$photoPath=pathinfo($photo["name"]);
    	$storeFileName=$storePath.$WXName.".".$photoPath["extension"];
    	if (file_exists($storeFileName))
    	{
    		$storeFileName=$storePath.$WXName.time().".".$photoPath["extension"];
    	}
		if (!move_uploaded_file($photo["tmp_name"],$storeFileName))
      	{	
    		echo "<script language='JavaScript'>alert('上传失败，请您返回后重新上传！');location.replace('content.php?content=activity')</script>";
      		unlink($photo['tmp_name']);      
      		exit;
      	}
  	}
}
else
{
	echo "<script language='JavaScript'>alert('请上传'.$fileMaxSize.'K以下jpg/jpeg/png图片格式！');location.replace('content.php?content=activity')</script>";
	exit;
}
  
$sql = "insert into WEIXIN2_activity values('".$date."','".$WXName."','".$name."','".$phone."','".$mail."','".$storeFileName."')";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
if (mysql_affected_rows()>0)
{
	echo '您的信息已提交成功，谢谢！';
}
else{
	echo "<script language='JavaScript'>alert('很抱歉，您的信息未提交成功，请您返回后重新填写！');location.replace('content.php?content=activity')</script>";
	unlink($storeFileName);
	unlink($photo['tmp_name']);
}
mysql_close();
?>