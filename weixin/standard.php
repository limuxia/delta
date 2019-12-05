<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<link rel="stylesheet" type="text/css" href="css.css?v=1.0.1" />
<title>
<?php
	$standard=$_GET["standard"];
	echo $standard;
?>
</title>
</head>
<body>
<div id="content2">
<?php
    $standard=str_replace('/','',$standard);
	include("standard/".$standard.".php");
?>
</div>
<div id="footer"><span>PPE&nbsp安全顾问</span><img src="pictures/logo.jpg" /></div>	
</body>
</html>