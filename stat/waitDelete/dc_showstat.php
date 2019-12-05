<div class="stat">
<?php

if($_SESSION['login'] != 'sales')
{
  echo '<center><br /><br /><br /><br /><br /><h1>你无法访问此网页</h1></center>';
  exit;
}
else
{
	include("config/dbconnect_users.php");
	
	$sql1 = "SELECT COUNT(*) AS Nb_huadong FROM statistic WHERE name='huadong'";
	$req1 = mysql_query($sql1) ;	
	$data1 = mysql_fetch_array($req1);
	$sql2 = "SELECT COUNT(*) AS Nb_huanan FROM statistic WHERE name='huanan'";
	$req2 = mysql_query($sql2) ;
	$data2 = mysql_fetch_array($req2);
	$sql3 = "SELECT COUNT(*) AS Nb_huabei FROM statistic WHERE name='huabei'";
	$req3 = mysql_query($sql3) ;
	$data3 = mysql_fetch_array($req3);
	$sql4 = "SELECT COUNT(*) AS Nb_other FROM statistic WHERE name='other'";
	$req4 = mysql_query($sql4) ;
	$data4 = mysql_fetch_array($req4);
	$sql5 = "SELECT COUNT(*) AS Nb_sales FROM statistic WHERE name='sales'";
	$req5 = mysql_query($sql5) ;
	$data5 = mysql_fetch_array($req5);
	echo '<table><tr><td>Huadong</td><td>';
	echo $data1['Nb_huadong'];
	echo '</td></tr><tr><td>Huanan</td><td>';
	echo $data2['Nb_huanan'];
	echo '</td></tr><tr><td>Huabei</td><td>';
	echo $data3['Nb_huabei'];
	echo '</td></tr><tr><td>Other</td><td>';
	echo $data4['Nb_other'];
	echo '</td></tr><tr><td>Sales</td><td>';
	echo $data5['Nb_sales'];
	echo '</td></tr></table>';
}

?>
</div>