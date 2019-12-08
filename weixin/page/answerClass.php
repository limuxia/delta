<script type="text/javascript"src="js/fold_list.js"></script>
<div id="content">
	<ul id="foldList" class='ulStyle1'>
<?php

include("connectDB.php");
$sql = "select * from answerclass";
$result = mysql_query($sql);
while($row=mysql_fetch_array($result))
{
	echo "<li>";
	echo "<div class='item'><span class='item_title'>";
	echo $row[1];
	echo "</span></div><hr />";

	$sql="select id,answerName from answer where classId='$row[0]'";
	$result2=mysql_query($sql);
	echo "<div class='fold'>";
	while($row2 = mysql_fetch_array($result2))
	{
		echo "<div><a class='aStyle1' href='index.php?page=answer&answerId={$row2[0]}'><p class='itemEffect pMargin0'>{$row2[1]}</p></a></div><hr />";
	}

	echo "</div></li>";
}
mysql_close();

?>
  </ul>
</div>