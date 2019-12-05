	 <style type="text/css">
	 	table{
	 		border:1px solid;
	 		border-spacing:0;
	 	}
	 	table th,table td{
	 		border:1px solid;
	 	}
	 </style>
<p>活动注册信息查询</p>
<?php 
$activityStart=$_REQUEST['activityStart'];
$activityEnd=$_REQUEST['activityEnd'];

echo "活动开始日期：".$activityStart."<br />";
echo "活动结束日期：".$activityEnd."<br />";
?>
<table>
	<tr>
		<th>时间</th>
		<th>微信名</th>
		<th>姓名</th>
		<th>手机</th>
		<th>邮箱</th>
		<th>截图上传</th>
	</tr>
<?php
include('../config/dbconnect.php');

$sql = 'SELECT date,WXName,Name,phone,mail,photo from WEIXIN2_activity WHERE ';
if($activityStart!=""){$sql=$sql."date>='".$activityStart."' and ";}
if($activityEnd!=""){$sql=$sql."date<='".$activityEnd."' and ";}
$sql=$sql."1=1";

$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
if (mysql_num_rows($req)>0)
{
	while ($data = mysql_fetch_array($req)){ 
 		echo '<tr><td>'.$data['date'].'</td><td>'.$data['WXName'].'</td><td>'.$data['Name'].'</td><td>'.$data['phone'].'</td><td>'.$data['mail'].'</td><td><img style="width:100px;" src="'.$data['photo'].'" /></td></tr>';
	}	
	mysql_close();
}
else{
	echo "<script language='JavaScript'>alert('找不到数据，请返回重新查找');location.replace('query.php?query=queryActivity')</script>";
	exit;
}
?>
</table>