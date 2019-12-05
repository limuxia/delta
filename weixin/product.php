<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<link rel="stylesheet" type="text/css" href="css.css?v=1.0.1" />
<?php
    include("../config/dbconnect.php");
    $sql_classificaton="select name from WEIXIN_classification where classification_id='".$_GET['classification_id']."'";
	try{
		$query_classification = mysql_query($sql_classificaton);
		$row_classification=mysql_fetch_assoc($query_classification);	
   		$classification=$row_classification['name'];
	}catch (Exception $e){
		echo "error:".$e->getMessage();
	}
	
    $sql_product = "select model,name,description,photo from WEIXIN_product where product_id='".$_GET['product_id']."'";	
	try{
		$query_product = mysql_query($sql_product);	
		if($row_product=mysql_fetch_assoc($query_product)){
			$model=$row_product['model'];
			$name=$row_product['name'];
			$description=$row_product['description'];
			$photo=$row_product['photo'];
			if($description=="" or $photo==""){	//如果值为空则从分类的产品表中看能否抓到数据
				$sql_product = "select b.description as description,b.photo as photo,b.id as id
								from WEIXIN_product as a
								inner join ".$classification." as b
								on b.name=a.model
								where a.product_id='".$_GET['product_id']."'";	
				$query_product = mysql_query($sql_product);	
				if($row_product=mysql_fetch_assoc($query_product)){
					$description=$row_product['description'];
					$photo="../".$row_product['photo'].$row_product['id'].".jpg";
				}
			}
		}
		mysql_close();		
	}catch (Exception $e){
		echo "error:".$e->getMessage();
	}
	echo "<title>".$name."：".$model."</title>"
?>
</head>
<body>
<div id="content2">
<?php
	echo "<p><strong>".$model."</strong><br /><br />".$name."<br /><br />".$description."</p><img src='".$photo."' />";
?>
</div>
<div id="footer"><span>PPE&nbsp安全顾问</span><img src="pictures/logo.jpg" /></div>	
</body>
</html>