<?php
	include("config/dbconnect.php");
	$id_news=$_POST['id_news'];
	$sql = "SELECT date,title,description FROM news WHERE id='$id_news' ";
	$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());
	$data = mysql_fetch_array($req);
	echo '<table align="center" cellpadding="1" cellspacing="5"><tr valign="middle"><td bgcolor="#E21313"><font color="#FFFFFF">';
	echo $data['date'];
	echo '</td><td colspan="2" bgcolor="#FF866A"><font color="#FFFFFF">';
	echo $data['title'];
	echo '</td></tr><tr><td colspan="3"><div class="descr_news">';
	echo $data['description'];
	echo '</div></td></tr></table>';
	mysql_close(); 
?>
