<?php	
// mysql 升级 mysqli 语法不变封装
global $connectDBServer;
require_once('mysql.php');

//session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="description" content="" />
	<meta name="keywords" content="安全鞋, 防砸, 防穿刺, 防静电, 绝缘, 耐高温, 耐磨, 耐油, 防滑, 透气, PU, 橡胶, 安全靴, 防化靴, 防寒, 安全带, 减震绳, 三脚架, 安全绳, 上升器, 下降器, 安全钩, 速差器, 防化服, 气密, 液密, 重型, 镀铝隔热服, 防火防化服, 1000度, 阻燃服, 防静电, 雨衣, 防寒服, 零下20度, 工作服, 荧光服, 焊工, 冷库防寒服, 防护手套, 氯丁橡胶, 丁腈, 天然乳胶, PVC, PU涂层, 防割, 耐磨, 防撕裂, 防穿刺, 隔热, 防静电, 防油, 防滑, 防化, 耐高温, 防寒, 绝缘, 防水, 焊工, 套袖, 一次性, 呼吸器, 全面罩, 半面罩, 过滤罐, 过滤盒, 滤棉, 防尘口罩, 活性炭, 洗眼器, 变光面罩, 面屏, 护目镜, 耳塞, 耳罩, 安全帽, ABS, PE" />
	<link href="style2.css" rel="stylesheet" type="text/css">
	<title>Delta Plus China - 代尔塔中国</title>
	</head>
<body>
		<div class="including">
			<?php

            $dir=isset($_REQUEST['dir']) ? $_REQUEST['dir'] : "";
            $page=isset($_REQUEST['page']) ? $_REQUEST['page'] : "welcome";

			if($dir=="page")
			{
				include("$dir/$page.php");
			}
			elseif($dir=="activity")
			{
				include("page/$dir/$page.html");
			}
			else{
				include("dc_".$page.".php");
			}
			?>
		</div>
</body>
</html>