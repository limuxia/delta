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
$company=$_REQUEST['company'];
?>
<p>VIP注册信息查询</p>
<table>
	<tr>
		<th>日期</th>
		<th>公司名称</th>
		<th>公司类型</th>
		<th>所在城市</th>
		<th>姓名</th>
		<th>手机</th>
		<th>邮箱</th>
		<th>销售渠道</th>
		<th>职务</th>
	</tr>
<?php
include('../config/dbconnect.php');

$sql = 'SELECT date,company,companyType,address,name,phone,mail,salesChannel,post from WEIXIN2_vip WHERE ';
if($company!=""){$sql=$sql."company='".$company."' and ";}
$sql=$sql."1=1";

$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
if (mysql_num_rows($req)>0)
{
	while ($data = mysql_fetch_array($req)){ 
 		echo '<tr><td>'.$data['date'].'</td><td>'.$data['company'].'</td><td>'.$data['companyType'].'</td><td>'.$data['address'].'</td><td>'.$data['name'].'</td><td>'.$data['phone'].'</td><td>'.$data['mail'].'</td><td>'.$data['salesChannel'].'</td><td>'.$data['post'].'</td></tr>';
	}	
	mysql_close();
}
else{
	echo "<script language='JavaScript'>alert('找不到数据，请返回重新查找');location.replace('query.php?query=queryVip')</script>";
	exit;
}
?>
</table>