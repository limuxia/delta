<?php
include("config/dbconnect.php");
$word=$_POST['word'];
$j = 1; 
	
$sql = '(SELECT id,name,norm,"" as size,description,photo FROM head WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")
			union all (SELECT id,name,norm,"" as size,description,photo FROM respiratory WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")
			union all (SELECT id,name,norm,size,description,photo FROM gloves WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")
			union all (SELECT id,name,norm,size,description,photo FROM shoes WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")
			union all (SELECT id,name,norm,size,description,photo FROM tec_clothes WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")
			union all (SELECT id,name,norm,size,description,photo FROM wk_clothes WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")
			union all (SELECT id,name,norm,"" as size,description,photo FROM fall_arrest WHERE id LIKE "%'.$word.'%" OR name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")';
$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());

echo '<table cellspacing="10"><tr valign="top">';	
if (mysql_num_rows($req)>0)
{
	
	while ($data = mysql_fetch_array($req)){	
	 	echo '<td>
	 			<table style="width:396px" cellspacing="10">';
	 	
		if ($data['size']==""){	
	 		echo '<tr>
	 				<td width="150px" rowspan="3"></td>
	 				<td width="200px" class="bottomGray3"><h5>'.$data['name'].'</h5></td>
	 			</tr>
	 			<tr><td>'.$data['id'].'</td></tr>';
     		if ($data['norm']==""){
       			echo '<tr><td><img src="pictures/norm/ce.jpg" /></td></tr>';
     		}else{
      			echo '<tr><td><img src="'.$data['norm'].$data['id'].'_ce.jpg" /></td></tr>';
     		} 
     	}else{
	 		echo '<tr>
	 				<td width="150px" rowspan="4"></td>
	 				<td width="200px" class="bottomGray3"><h5>'.$data['name'].'</h5></td>
	 			</tr>
	 			<tr><td>'.$data['id'].'</td></tr>';
     		if ($data['norm']==""){
       			echo '<tr><td><img src="pictures/norm/ce.jpg" /></td></tr>';
     		}else{
      			echo '<tr><td><img src="'.$data['norm'].$data['id'].'_ce.jpg" /></td></tr>';
     		}
     		echo '<tr><td align="right">'.$data['size'].'</td></tr>';     		
     	}
     	
	 	echo '<tr valign="top">
	 				<td><img src="'.$data['photo'].$data['id'].'.jpg" /></td>
	 				<td>'.$data['description'].'</td>
	 			</tr>
	 		</table></td>';
	 	
		if ($j%2 == 0){ 
	   		echo '</tr>
	   				<tr valign="top">'; 
	 	} 
	    
	 	$j++;	  
	}
	
}else{
	
	echo '<td align="center"><a href="index.php?dir=&page=search">未查询到结果，请重试</a></td>';
	echo '</tr></table>';
	
}
mysql_close();
?>	