<p class="edge3">

<?php

	include('../config/dbconnect.php');
	$word=$_REQUEST['word'];
	$sql = "select code, classify, company, region, trade, authorization_term from weixin_authorization where code='$word'";
	$req = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
	if( mysql_num_rows($req)>0 ){
		while ( $data = mysql_fetch_assoc($req) ){ 
			echo $data['code'].'<br />';
			echo $data['company'].'<br />';
			if ($data['classify']=='经销授权'){
				echo $data['region'].' 地区<br />';
				echo $data['trade'].' 行业<br />';
				echo '不含网络渠道<br /><br />';
			}
			elseif ($data['classify']=='网络渠道'){	 			
				echo $data['region'].' 平台<br />';
				echo $data['trade'].'<br />';
				echo '网络渠道<br /><br />';
			}elseif($data['classify'] == '生命线授权'){
				echo $data['region'].' 地区<br />';
				echo $data['authorization_term'].'年度<br />';
				
			}
		}
	}
	else{
		echo "<script language='JavaScript'>alert('无此授权');location.replace('content.php?content=authorized_search')</script>";
		exit;
	}

?>

</p>