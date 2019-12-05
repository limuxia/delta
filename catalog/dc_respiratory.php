<?php 
include("config/dbconnect.php"); // connect to database

$nbprodbypage = 6; 


$back = mysql_query("SELECT COUNT(*) AS nb_products FROM respiratory"); 
$data = mysql_fetch_array($back); 

$total_pro = $data['nb_products']; 
$nbpages = ceil($total_pro / $nbprodbypage); 
$j = 1; 

if (isset($_GET['num'])) { 
if(is_numeric($_GET['num'])) { 
$num = $_GET['num']; 
} else { 
$num = 1; 
} 
} 
else { 
$num = 1; 
} 

$firstmessage = ($num - 1) * $nbprodbypage; 
$req = mysql_query('SELECT id,name,norm,description,photo FROM respiratory ORDER BY sequence LIMIT ' . $firstmessage . ', ' . $nbprodbypage); 

echo '<table cellspacing="10"><tr valign="top">';
while ($data = mysql_fetch_array($req)){ 
	
 echo '<td>
 		<table style="width:396px" cellspacing="10">
 			<tr>
 				<td width="150px" rowspan="3"></td>
 				<td width="200px" class="bottomGray3"><h5>'.$data['name'].'</h5></td>
 			</tr>
 			<tr><td>'.$data['id'].'</td></tr>';
 if($data['norm']==""){
 	echo '<tr><td><img src="pictures/norm/ce.jpg" /></td></tr>';
 }else{
 	echo '<tr><td><img src="'.$data['norm'].$data['id'].'_ce.jpg" /></td></tr>';
 }
 echo '<tr valign="top">
 			<td><img src="'.$data['photo'].$data['id'].'.jpg" /></td>
 			<td>'.$data['description'].'</td>
 		</tr>
 	</table></td>';
 
 if ($j%2 == 0) 
 { 
   echo '</tr>
   		<tr valign="top">'; 
 } 
 
 $j++;
  
} 

echo '</tr><tr><td colspan="2" align="center">| &nbsp;'; 
for ($i = 1 ; $i < $num ; $i++) { 
echo '<a href="index.php?dir=catalog&page=respiratory&num=' . $i . '">'. $i .'</a> &nbsp;|&nbsp; '; 
} 
echo '<a href="index.php?dir=catalog&page=respiratory&num=' . $num . '"><b><font size="+1">'. $num .'</font></b></a> &nbsp;|&nbsp; ';
for ($i = $num+1 ; $i <= $nbpages ; $i++) { 
echo '<a href="index.php?dir=catalog&page=respiratory&num=' . $i . '">'. $i .'</a> &nbsp;|&nbsp; '; 
}  
echo '</td></tr></table>';
mysql_close(); 
?> 
