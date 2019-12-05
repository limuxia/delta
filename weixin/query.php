<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css.css" />
<?php
$query=$_GET["query"];
?>
</head>
<body>
<div id="content2" style="margin:10px;padding:10px;">
<?php
   include("query/".$query.".php");
?>
</div>
<div id="footer"><span>全球防护&nbsp本地服务</span><img src="pictures/logo.jpg" /></div>		
</body>
</html>