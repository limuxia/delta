<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<link rel="stylesheet" type="text/css" href="css.css?v=1.0.1" />
<title>标准与装备</title>
</head>
<body>
<div id="content">
	<div>
  		<ul>
  			<div class="title"><span>欧标</span></div>
<?php
    include("../config/dbconnect.php");
	$sql_standard = "select a.standard_id as standard_id,b.name as name
						from WEIXIN_riskStandard as a
						inner join WEIXIN_standard as b
						on b.standard_id=a.standard_id
						where a.risk_id='".$_GET["risk_id"]."'
  						and b.classification_id='0001'";
	try{
		$query_standard = mysql_query($sql_standard);	
		while($row_standard=mysql_fetch_assoc($query_standard)){
			echo "<li class='item'><a href='standard.php?standard=".$row_standard['name']."'><span>";
			echo $row_standard['name'];
			echo "</span></a></li><hr />";
		}
	}catch (Exception $e){
		echo "error:".$e->getMessage();
	}
?>
 		</ul>
  		<ul>
  			<div class="title"><span>国标</span></div>
<?php
	$sql_standard = "select a.standard_id as standard_id,b.name as name
						from WEIXIN_riskStandard as a
						inner join WEIXIN_standard as b
						on b.standard_id=a.standard_id
						where a.risk_id='".$_GET["risk_id"]."'
						and b.classification_id='0002'";
	try{
		$query_standard = mysql_query($sql_standard);	
		while($row_standard=mysql_fetch_assoc($query_standard)){
			echo "<li class='item'><a href='standard.php?standard=".$row_standard['name']."'><span>";
			echo $row_standard['name'];
			echo "</span></a></li><hr />";
		}
	}catch (Exception $e){
		echo "error:".$e->getMessage();
	}
?>
 	 	</ul>
 	</div>
 	<div>
 	<ul>
 		<div class="title"><span>推荐装备</span></div>
<?php
	$sql_equipment = "select a.product_id as product_id,b.name as name,b.classification_id as classification_id
						from WEIXIN_tradeRiskEquipment as a
						inner join WEIXIN_product as b
						on b.product_id=a.product_id
						where a.trade_id='".$_GET["trade_id"]."'
  						and a.risk_id='".$_GET["risk_id"]."'";
	try{
		$query_equipment = mysql_query($sql_equipment);	
		while($row_equipment=mysql_fetch_assoc($query_equipment)){
			echo "<li class='item'><a href='product.php?product_id=".$row_equipment['product_id']."&classification_id=".$row_equipment['classification_id']."'><span>";
			echo $row_equipment['name'];
			echo "</span></a></li><hr />";
		}	
		mysql_close();		
	}catch (Exception $e){
		echo "error:".$e->getMessage();
	}
?>
  	</ul>
  	</div>
</div>
<div id="footer"><span>PPE&nbsp安全顾问</span><img src="pictures/logo.jpg" /></div>	
</body>
</html>