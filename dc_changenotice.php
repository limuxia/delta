<?php 
	function switchcolor()
	 { 
		static $col;
		$couleur1 = "bottomYellow4";
		$couleur2 = "bottomGray4";	
		if ($col == $couleur1)
			$col = $couleur2;
		else
		   $col = $couleur1;
		return $col; 
	}
include("config/dbconnect.php"); // connect to database
$j = 1;
$col=switchcolor();

echo '<table cellspacing="13"><tr>';

$req = mysql_query('SELECT id_solu,name,pdf FROM changenotice order by id_solu desc');

while ($data = mysql_fetch_array($req)){ 

 echo '<td align="center" class="'.$col.'"><a href="';

 echo '<font-weight="900"; color:#885599; text-decoration:underline>';
 echo '<font-style:italic>';
 //echo '.jpg"></a><br /><a href="';
 echo '</a><br /><a href="';
 echo $data['pdf'];
 echo '.pdf">';
 echo $data['name'];


 echo '</a></td>';
 if ($j%2 == 0) 
 { 
/* 	echo '<td width="width:75px" align="left"><a href="';
	echo '<table cellpadding="1px">';
	echo '<tr><td colspan="8" bgcolor="#F4661B"><b><font color="#FFFFFF">';*/
   	echo '</tr><tr>'; 
   	$col=switchcolor();
 } 
 $j++; 
} 

echo '</tr></table>';
mysql_close();
?>
