<script type="text/javascript"src="js/fold_list.js"></script>
<div id="content">
	<ul id="foldList" class='ulStyle1'>
<?php

include("connectDB.php");
$sql = "select * from job";
$result = mysql_query($sql);
while($row=mysql_fetch_array($result))
{
	echo "<li>";
	echo "<div class='item'><span class='item_title'>";
	echo $row[1];
	echo "</span><span class='item_count'>";

	$sql="select distinct a.code_risk,b.risk from job_risk_guard as a left join risk as b on b.code=a.code_risk where a.code_job='$row[0]'";
	$result2=mysql_query($sql);
	echo mysql_num_rows($result2)."条风险</span></div><hr />";
	echo "<div class='fold'>
				<div><p class='itemEffect fontStyle2 pMargin0'>说明：$row[2]</p></div><hr />
				<div><p class='itemEffect fontStyle2 pMargin0'>作业举例：$row[3]</p></div><hr />";	//将字体效果fontStyle单独列出来是因为放在itemEffect里会影响下面a链接字体效果
	while($row2 = mysql_fetch_array($result2))
	{
		echo "<div><a class='aStyle1' href='index.php?page=riskGuard&job=$row[0]&risk=$row2[0]'><p class='itemEffect pMargin0'>";
		echo "风险：".$row2[1];
		echo "</p></a></div><hr />";
	}

	echo "</div></li>";
}
mysql_close();

?>
  </ul>
</div>