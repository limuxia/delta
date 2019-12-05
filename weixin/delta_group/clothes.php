<?php 
include("../config/dbconnect.php"); // connect to database

$nbprodbypage = 6; 


$back = mysql_query("SELECT COUNT(*) AS nb_products FROM wk_clothes"); 
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
$req = mysql_query('SELECT id,name,size,norm,description,photo FROM wk_clothes ORDER BY id DESC LIMIT ' . $firstmessage . ', ' . $nbprodbypage); 

echo '<table cellspacing="10"><tr valign="top">';
while ($data = mysql_fetch_array($req)){ 
 echo '<td><table style="width:396px" cellspacing="10"><tr><td width="150" rowspan="5" align="center"><img src="../';
 echo $data['photo'].$data['name'];
 echo '.jpg" /></td><td width="200px" class="bottomGray3"><h5>';
 echo $data['name'];
 echo '</h5></td></tr><tr><td>';
 echo $data['id'];
 echo '</td></tr><tr><td>';
 echo '<img src="../pictures/norm/ce.jpg" style="float:left;" />';
 if($data['norm']=='pictures/norm/wk_clothes/')
 {
 	echo '<img src="../';
 	echo $data['norm'].$data['name']."_ce";
 	echo '.jpg" style="float:left;" />';
 }
 elseif($data['norm']!='pictures/norm/clothes/' && $data['norm']!='pictures/norm/clothes' && $data['norm']!='' && $data['norm']!='no')
 {
 	echo '<img src="../';
 	echo $data['norm'];
 	echo '.jpg" style="float:left;" />';
 }
 echo '</td></tr><tr><td width="200px" align="right">';
 echo $data['size'];
 echo '</td></tr><tr><td width="200px">';
 echo $data['description'];
 echo '</td></tr></table></td>';
 if ($j%2 == 0) 
 { 
   echo '</tr><tr valign="top">'; 
 } 
 $j++; 
} 

echo '</tr><tr><td colspan="2" align="center">| &nbsp;'; 
for ($i = 1 ; $i < $num ; $i++) { 
echo '<a href="content2.php?content=clothes&num=' . $i . '">'. $i .'</a> &nbsp;|&nbsp; '; 
} 
echo '<a href="content2.php?content=clothes&num=' . $num . '"><b><font size="+1">'. $num .'</font></b></a> &nbsp;|&nbsp; ';
for ($i = $num+1 ; $i <= $nbpages ; $i++) { 
echo '<a href="content2.php?content=clothes&num=' . $i . '">'. $i .'</a> &nbsp;|&nbsp; '; 
} 
echo '</td></tr></table>';
mysql_close(); 
?> 
