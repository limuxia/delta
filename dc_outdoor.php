
<?php 
include("config/dbconnect.php"); // connect to database
$j = 1;

echo '<div class="outdoor"><table style="width:750px;" cellspacing="15"><tr><td colspan="2" align="center"><h4>户外装备</h4></td></tr><tr>';

$req = mysql_query('SELECT id_outdoor,name,picture,pdf,description FROM outdoor');
while ($data = mysql_fetch_array($req)){ 
 echo '<td width="250px" align="center"><a href="';
 echo $data['pdf'];
 echo '.pdf" /><img src="';
 echo $data['picture'];
 echo '.jpg"></a><br /><a href="';
 echo $data['pdf'];
 echo '.pdf">';
 echo $data['name'];
 echo '</a></td>';
 echo '<td width="400px" valign="top" align="left">';
 echo $data['description'];

 if ($j%3 == 0) 
 { 
   echo '</tr><tr>'; 
 } 
 $j++; 
} 


echo '</tr></table></div>';
mysql_close();
?>
