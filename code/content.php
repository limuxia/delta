<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css.css" />
<?php
$content=$_GET["content"];
switch ($content){
	case "nfc_app":
		$title="NFC管理APP";
		break;
}
echo "<title>".$title."</title>";
?>
</head>
<body>
<div id="content">
<?php
   include("content/".$content.".html");
?>
</div>
<div id="footer"><span>全球防护&nbsp本地服务</span><img src="logo.jpg" /></div>		
</body>
</html>