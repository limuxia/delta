<div id="content">

<?php

include("connectDB.php");

/*
$sql = "select a.code_guard,b.guardCategory from job_risk_guard as a left join guard as b on b.code=a.code_guard where a.code_job='{$_REQUEST['job']}' and a.code_risk='{$_REQUEST['risk']}' and a.flag=1";
$result = mysql_query($sql);
echo "<div>
			<p class='title pMargin0'>必须配备防护用品</p>
			<ul class='ulStyle1'>";
while($row=mysql_fetch_array($result))
{
	echo "<li><a class='aStyle2' href='index.php?page=guardData&guard=$row[0]'><p class='itemEffect2 pMargin0'>$row[0]$row[1]</p></a></li><hr />";
}
echo "</ul></div>";

$sql = "select a.code_guard,b.guardCategory from job_risk_guard as a left join guard as b on b.code=a.code_guard where a.code_job='{$_REQUEST['job']}' and a.code_risk='{$_REQUEST['risk']}' and a.flag=0";
$result = mysql_query($sql);
echo "<div>
			<p class='title pMargin0'>建议配备防护用品</p>
			<ul class='ulStyle1'>";
while($row=mysql_fetch_array($result))
{
	echo "<li><a class='aStyle2' href='index.php?page=guardData&guard=$row[0]'><p class='itemEffect2 pMargin0'>$row[0]$row[1]</p></a></li><hr />";
}
*/

$sql = "select a.code_guard,b.guardCategory from job_risk_guard as a left join guard as b on b.code=a.code_guard where a.code_job='{$_REQUEST['job']}' and a.code_risk='{$_REQUEST['risk']}'";
$result = mysql_query($sql);
echo "<div>
			<p class='title pMargin0'>配备防护用品</p>
			<ul class='ulStyle1'>";
while($row=mysql_fetch_array($result))
{
	echo "<li><a class='aStyle2' href='index.php?page=guardData&guard=$row[0]'><p class='itemEffect2 pMargin0'>$row[0]$row[1]</p></a></li><hr />";
}
echo "</ul></div>";
mysql_close();

?>

</div>