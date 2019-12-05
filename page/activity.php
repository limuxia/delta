<?php

include("config/dbconnect.php");

$sql = "select * from activity order by no desc";
$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());

if (mysql_num_rows($req)>0)
{
	$intervalHeight=210;
	$intervalWidth=268;
	$i=0;
	echo "<div style='height:{$intervalHeight}px'>";
	while ($row = mysql_fetch_array($req))
	{
		$top=170+$intervalHeight*floor($i/3);
		$left=30+$intervalWidth*($i%3);
		$dateNow=date('Y-m-d');
		$intervalDay=date_diff(date_create($row[4]),date_create($dateNow))->format('%a');	//%a表示天不知道能不能为负所以下面再用日期比较来判断,MD官方资料都查不到这个用法，只能知其然不能知其所以然
		if($row[4]<$dateNow)
		{
			echo "<div style='float:left;margin-left:20px;width:240px;background-color:#dddddd;padding:4px'>
					<a href='index.php?dir=activity&page=$row[0]'><img class='gray' src='page/activity/image/$row[0]/1.png' /></a>
					时间： $row[3] ~ $row[4]<br />
					$row[1]
				</div>
				<div style='position:absolute;top:{$top}px;left:{$left}px;padding:2px 6px;background-color:black;color:white;font-weight:bold'>已结束</div>";
		}
		else
		{
			echo "<div style='float:left;margin-left:20px;width:240px;background-color:#dddddd;padding:4px'>
					<a href='index.php?dir=activity&page=$row[0]'><img src='page/activity/image/$row[0]/1.png' /></a>
					时间： $row[3] ~ $row[4]<br />
					$row[1]
				</div>
				<div style='position:absolute;top:{$top}px;left:{$left}px;padding:2px 6px;border:1px solid orange;color:orange;font-weight:bold'>{$intervalDay}天后结束</div>";
		}

		$i++;
		if($i%3==0)	//每行显示3列然后另起新行
		{
			echo "</div>
					<div style='clear:both'></div>
					<div style='height:{$intervalHeight}px'>";
		}
	}
	echo "</div>";
}

mysql_close();

?>
