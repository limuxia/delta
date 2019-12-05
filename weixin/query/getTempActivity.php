	 <style type="text/css">
	 	table{
	 		border:1px solid;
	 		border-spacing:0;
	 	}
	 	table th,table td{
	 		border:1px solid;
	 	}
	 </style>
<?php 
$activityNo=$_REQUEST['activityNo'];
$activityName=$_REQUEST['activityName'];
$activityStart=$_REQUEST['activityStart'];
$activityEnd=$_REQUEST['activityEnd'];

echo "活&nbsp;&nbsp;动&nbsp;&nbsp;编&nbsp;&nbsp;号：".$activityNo."<br />";
echo "活&nbsp;&nbsp;动&nbsp;&nbsp;名&nbsp;&nbsp;称：".$activityName."<br />";
echo "活动开始时间：".$activityStart."<br />";
echo "活动结束时间：".$activityEnd."<br />";
?>
<table>
	<tr>
		<th>时间</th>
		<th>活动编号</th>
		<th>活动名称</th>
		<th>微信名</th>
		<th>姓名</th>
		<th>地址</th>
		<th>电话</th>
		<th>邀请好友1</th>
		<th>邀请好友2</th>
		<th>邀请好友3</th>
	</tr>
<?php
include('../config/dbconnect.php');

$sql = 'SELECT time,activityNo,activityName,WXName,name,address,phone,friend1,friend2,friend3 from WEIXIN2_tempActivity WHERE ';
if($activityNo!=""){$sql=$sql."activityNo='".$activityNo."' and ";}
if($activityName!=""){$sql=$sql."activityName='".$activityName."' and ";}
if($activityStart!=""){$sql=$sql."time>='".$activityStart."' and ";}
if($activityEnd!=""){$sql=$sql."time<='".$activityEnd."' and ";}
$sql=$sql."1";

$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
if (mysql_num_rows($req)>0)
{
	while ($data = mysql_fetch_array($req)){ 
 		echo '<tr><td>'.$data['time'].'</td><td>'.$data['activityNo'].'</td><td>'.$data['activityName'].'</td><td>'.$data['WXName'].'</td><td>'.$data['name'].'</td><td>'.$data['address'].'</td><td>'.$data['phone'].'</td><td>'.$data['friend1'].'</td><td>'.$data['friend2'].'</td><td>'.$data['friend3'].'</td></tr>';
	}	
	mysql_close();
}
else{
	echo "<script language='JavaScript'>alert('找不到数据，请返回重新查找');location.replace('query.php?query=queryTempActivity')</script>";
	exit;
}
?>
</table>