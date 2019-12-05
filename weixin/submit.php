<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css.css" />
	<title>提交数据页面</title>
<?php
$submit=$_GET["submit"];
?>
</head>
<body>
<div id="content2" style="margin:10px;padding:10px;">
<?php
   include("submit/submit_".$submit.".php");
?>
</div>
<div id="footer"><span>全球防护&nbsp本地服务</span><img src="pictures/logo.jpg" /></div>		
</body>
</html>