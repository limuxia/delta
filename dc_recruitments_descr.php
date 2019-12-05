<?php
	include("config/dbconnect.php");
	$id_recruitment=$_POST['id_recruitment'];
	$sql = "SELECT * FROM recruitment WHERE id='$id_recruitment'";
	$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());
	$data = mysql_fetch_array($req);
	echo '<table style="width:820px;" class="tableThinBorder" cellpadding="5" cellspacing="0">';
	echo '<tr class="bottomYellow" align="center"><td colspan="8" style="border:none;"><b>';
	echo $data['title'];
	echo '</b></td></tr><tr><td bgcolor="#FFFF66">电子邮箱：</td><td colspan="7">';
	echo $data['contact'];
	echo '</td></tr><tr><td bgcolor="#FFFF66">发布日期：</td><td>';
	echo $data['date'];
	echo '</td><td bgcolor="#FFFF66">工作地点：</td><td>';
	echo $data['place'];
	echo '</td><td bgcolor="#FFFF66">招聘人数：</td><td>';
	echo $data['number'];
	echo '</td><td bgcolor="#FFFF66">工作年限：</td><td>';
	echo $data['experience'];
	echo '</td></tr><tr><td bgcolor="#FFFF66">外语要求：</td><td>';
	echo $data['language'];
	echo '</td><td bgcolor="#FFFF66">学历：</td><td>';
	echo $data['skill'];
	echo '</td><td bgcolor="#FFFF66"></td><td></td><td bgcolor="#FFFF66"></td><td></td></tr><tr><td colspan="8" style="border:none;">&nbsp</td></tr><tr class="bottomYellow" align="center"><td colspan="8" style="border:none;"><b>职位描述<b></td></tr><tr><td colspan="8" style="border:none;"><b>Job Description:</b><br />';
	echo $data['description'];
	echo '</td></tr>';
	if ($data['requirement'] != '')
	{
		echo '<tr><td colspan="8" style="border:none;"><b>';
		echo 'Post Requirement:</b><br />';
		echo $data['requirement'];
		echo '</td></tr>';
	}
	echo '</table>';
	mysql_close();
?>