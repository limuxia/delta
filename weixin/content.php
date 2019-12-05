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
	case "contact_us":
		$title="联系我们";
		break;
	case "msds_search":
		$title="MSDS查询";
		break;
	case "recommend_software":
		$title="检测软件推荐";
		break;
	case "authorized_search":
	case "get_authorized":
		$title="验证授权";
		break;
}
echo "<title>".$title."</title>";
?>
</head>
<body>
<div id="content">
<?php
	if ($content!="")
	{
   		include("delta_group/".$content.".php");
	}
?>
</div>
<div id="footer"><span>PPE&nbsp安全顾问</span><br><img src="pictures/logo.jpg" /></div>
</body>
</html>