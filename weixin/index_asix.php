<?php
//error_reporting(E_ALL & E_STRICT);    // php5开始，增加 E_STRICT 并不包含在 E_ALL 之中，所以额外启用
error_reporting(E_ALL & ~E_DEPRECATED & E_STRICT);  //wamp2.5不或不能很好支持php5.3，因此取消此“在未来版本中可能无法正常工作的代码给出警告”

// mysql 升级 mysqli 语法不变封装
global $connectDBServer;
require_once('../mysql.php');

session_start();
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<link rel="stylesheet" type="text/css" href="css.css" />
<?php
$page = '';
$title = '';
if (isset($_REQUEST['page']))
{
	$page=$_REQUEST['page'];
}
switch ($page){
	//动态页
	case 'complain_asix':
		$title = 'Quality complaint';
		break;
	case 'complainView_asix':
		$title = 'Quality complaint manage';
		break;
	case 'complainSearch_asix':
		$title = 'Quality complaint search';
		break;

	//静态页
}
echo "<title>$title</title>";
?>
</head>
<body>
<div id="mainBody">
<?php
	if ($page != '')
	{
   		include("page/$page.php");
	}
?>
</div>
</body>
</html>