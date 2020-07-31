<?php

$title = "";
$page = $_REQUEST['page'];

switch ($page){
	case "franchiser":
		$title = "信息反馈";
		break;
	case "franchiser_product_trial":
		$title = "产品试用反馈";
		break;

	default:
		exit("Error: Page not found.");
}

?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<head>

<script>
	/**
	 * 手机端自动缩放页面 -- 覆盖手机端默认缩放
	 * 注意使用此就不要再设置 <meta name="viewport" content="width=device-width, initial-scale=1" />
	 * https://www.cnblogs.com/beileixinqing/p/6141964.html
	 */
	var phoneWidth = parseInt(window.screen.width);
	var phoneHeight = parseInt(window.screen.height);
	var phoneScale = phoneWidth/480;//除以的值按手机的物理分辨率
	var ua = navigator.userAgent;

	if (/Android (\d+\.\d+)/.test(ua)) {
		var version = parseFloat(RegExp.$1);
		// andriod 2.3
		if (version > 2.3) {
			document.write('<meta name="viewport" content="width=device-width,initial-scale='+phoneScale+',minimum-scale='+phoneScale+',maximum-scale='+phoneScale+',user-scalable=no">');
		// andriod 2.3以上
		} else {
			document.write('<meta name="viewport" content="width=device-width,user-scalable=no">');
		}
	// 其他系统
	} else {
		document.write('<meta name="viewport" content="width=device-width, initial-scale='+phoneScale+',minimum-scale='+phoneScale+',maximum-scale ='+phoneScale +',user-scalable=no,">');
	}
</script>

<style type="text/css">

	/*用以去除边距和自动铺满高度，但实际应用padding和width不用设置*/
	html,body{margin:0;padding:0;height:100%;width:100%;}


	/*解决所有浏览器input/textarea宽度100%总是超出一点两个还不一样问题，也不知道算不算是bug不懂为什么但这样就可以好*/
	input,textarea{box-sizing:border-box;}

</style>

	<title><?= $title ?></title>
</head>
<body>

	<div style="width: 480px; min-height:794px; margin: 0 auto; background-image: url('pictures/franchiser/bg.png'); background-size: 480px">
	
		<?php require("page/$page.php") ?>		

	</div>

	<div style="width: 480px; margin: 0 auto">
		<div style="width: 200px; margin: 0 auto 70px auto"><img style="width: 100%" src="pictures/franchiser/logo.png" /></div>
	</div>

</body>
</html>