<table cellspacing="0" cellpadding="0" style="width:624px">
    <?php
	function switchcolor()
	 { 
		static $col;
		$couleur1 = "bottomYellow2";
		$couleur2 = "bottomGray2";	
		if ($col == $couleur1)
			$col = $couleur2;
		else
		   $col = $couleur1;
		return $col; 
	}
	
	include("config/dbconnect.php");
	$sql = "SELECT date,title,id FROM recruitment ORDER BY id DESC";
	$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());
	while ($data = mysql_fetch_array($req))
	{
		$col=switchcolor();
//		echo '<tr><td><td><img src="pictures/delta/circle.JPG"/></td><td bgcolor=';
//		echo $col;
//		echo '>';
		echo '<tr class="'.$col.'"><form method="post" action="index.php?dir=&page=recruitments_descr"><td><strong>';
		echo $data['title'];
		echo '</strong></td><td>';
//		echo '</td><td bgcolor=';
//		echo $col;
//		echo '>';
		echo $data['date'];
		echo '<input type="hidden" name="id_recruitment" value="';
		echo $data['id'];
		echo '" /></td><td align="center"><input type="submit" value="更多信息" name="valid" class="buttonRoundCorner" style="width:80px;" /></td></form></tr>';
	}
	mysql_close();
?>
   <tr><td colspan="3">
 	  <br />
 	  人事部 <br />
 	  <br />
      联系人：贺小姐 <br />
      <br />
      电话:0512-63647000-88806<br />
      <br />
      邮箱:<a href="mailto:hire@deltaplus.com.cn">hire@deltaplus.com.cn</a><br />
   </td></tr>
</table>