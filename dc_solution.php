<?php 
include("config/dbconnect.php"); // connect to database
$j = 1;

echo '<table style="width:750px;" cellspacing="15"><tr>';

$req = mysql_query('SELECT id_solu,name,picture,pdf FROM solution order by id_solu DESC');
while ($data = mysql_fetch_array($req)){ 
 echo '<td width="250px"><a href="';
 echo $data['pdf'];
 echo '.pdf" /><img src="';
 echo $data['picture'];
 echo '.jpg"></a><br /><br /><a href="';
 echo $data['pdf'];
 echo '.pdf">';
 echo $data['name'];
 echo '</a><br /><br /></td>';
 if ($j%3 == 0) 
 { 
   echo '</tr><tr>'; 
 } 
 $j++; 
} 


echo '</tr></table>';
mysql_close();
?>
