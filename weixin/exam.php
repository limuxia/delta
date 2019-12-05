<?php

// 写入 key
function write_key($key)
{
	$file_keys = fopen('./exam/keys.txt', 'a');
	fwrite($file_keys, $key . "\r\n");
	fclose($file_keys);
	return;
}

/**
 *  查找 key 
 *  存在时返回 key 所在行
 *  不存在时返回空字符串
 */
function find_key($key)
{
	$file_keys = fopen('./exam/keys.txt', 'r');
	$result = '';
	while(!feof($file_keys)){
		$data = rtrim(fgets($file_keys));	// 去掉回车换行符
		if($key == $data){	// 找到时停止执行
			$result = $data;
			break;
		}
	}

	fclose($file_keys);
	return $result;
}

	// key 验证 
	if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == 'check_key'){
		$key = $_REQUEST['key'];
		$result = find_key($key);
		exit($result);
	}

?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
<link rel="stylesheet" type="text/css" href="css.css?v=1.0.1" />

<?php

$exam="";
$title="";
if (isset($_REQUEST['exam']))
{
	$exam=$_REQUEST['exam'];
}
switch ($exam){
	case "exam_finance":
		$title="代尔塔笔试题-财务";
		break;
	case "exam_finance_2":
		$title="代尔塔机试题-财务";
		break;
}

echo "<title>".$title."</title>";

?>

</head>
<body>
<div id="content2">

<?php
	if ($exam!="")
	{
   		include("exam/".$exam.".php");
	}
?>
</div>
</body>
</html>