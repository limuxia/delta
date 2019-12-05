<!--相比content.php去掉了页脚框架显示-->
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<link rel="stylesheet" type="text/css" href="css.css?v=1.0.1" />
<?php
$content="";
$title="";
if (isset($_REQUEST['content']))
{
	$content=$_REQUEST['content'];
}
switch ($content){
	case "product":
		$title="产品介绍";
		break;
	case "search":
	case "printsearch":
		$title="搜索产品";
		break;
	case "head":
		$title="头部";
		break;
	case "resp":
		$title="呼吸类";
		break;
	case "gloves":
		$title="手部";
		break;
	case "shoes":
		$title="安全鞋";
		break;
	case "clothes":
		$title="工作服";
		break;
	case "tech_clothes":
		$title="防火防化服";
		break;
	case "fall_arrest":
		$title="防坠落";
		break;
}
echo "<title>".$title."</title>";
?>
</head>
<body>
<div id="content2">
<?php
	if ($content!="")
	{
   		include("delta_group/".$content.".php");
	}
?>
</div>
</body>
</html>