<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<script type="text/javascript"src="js/fold_list.js?v=1.0.1"></script>
<link rel="stylesheet" type="text/css" href="css.css?v=1.0.1" />
<title>行业风险</title>
</head>
<body>
<div id="content">
  	<ul id="trade_risk">
<?php
    include("../config/dbconnect.php");
	$sql_trade = "select trade_id,name from WEIXIN_trade order by convert(name using gbk) collate gbk_chinese_ci";	
	try{
		$query_trade = mysql_query($sql_trade);	
		while($row_trade=mysql_fetch_assoc($query_trade)){
			echo "<li>";
			echo "<div><a class='a_effect'><span class='item_title'>";
			echo $row_trade['name'];
			echo "</span><span class='item_count'>";
			$trade_id=$row_trade['trade_id'];
			$query_risk=query_risk($trade_id);
			echo mysql_num_rows($query_risk)."条风险</span></a><hr /></div>";
			while($row_risk = mysql_fetch_assoc($query_risk)){
				echo "<div class='fold'><div class='item'><a class='a_effect' href='standard_equipment.php?trade_id=".$trade_id."&risk_id=".$row_risk['risk_id']."'><span>";
				echo $row_risk['name'];
				echo "</span></a></div><hr /></div>";
			}
			echo "</li>";
		}	
		mysql_close();		
	}catch (Exception $e){
		echo "error:".$e->getMessage();
	}
	
	function query_risk($trade_id){
		$sql_risk="select a.risk_id as risk_id,b.name as name
					from WEIXIN_tradeRisk as a
					inner join WEIXIN_risk as b
					on b.risk_id=a.risk_id
					where a.trade_id='".$trade_id."'";
		try {
			$query_risk=mysql_query($sql_risk);			
		}catch (Exception $e){
			echo "error:".$e->getMessage();
		}
		return $query_risk;
	}
?>
  </ul>
</div>
<div id="footer"><span>PPE&nbsp安全顾问</span><img src="pictures/logo.jpg" /></div>	
</body>
</html>