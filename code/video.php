<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" media="screen and (min-width:801px)" href="css.css?v=2">
    <link rel="stylesheet" media="screen and (max-width:800px)" href="css.mobile.css?v=2">
<?php
$video=$_GET["video"];
switch ($video){

    case "vertic":
        $title="VERTIC生命线";
        break;
    case "harness_ess":
        $title="基础款安全带";
        break;
    case "acid_tech":
        $title="防化服技术";
        break;
	case "my_shoes":
		$title="匠心独运一鞋倾心";
		break;
	case "rope_access":
		$title="绳索作业";
		break;
	case "head_tech":
		$title="头面听技术";
		break;
	case "resp_tech":
		$title="呼吸类技术";
		break;
	case "glove_tech":
		$title="手套技术";
		break;
	case "shoes_tech":
		$title="安全鞋技术";
		break;
	case "workwear_tech":
		$title="工装设计";
		break;
	case "alu_tech":
		$title="隔热服技术";
		break;
	case "fall_scene":
		$title="防坠落场景";
		break;
	case "fall_rescue":
		$title="防坠落救援";
		break;
	case "welding_helmet":
		$title="变光面屏使用";
		break;
	case "earplug_use":
		$title="耳塞佩戴";
		break;
	case "winter_straps":
		$title="安全冬帽和内衬";
		break;
	case "spider_mask":
		$title="蜘蛛面罩装配戴";
		break;
	case "scba_use":
		$title="空呼装配戴";
		break;
	case "gargas_winter":
		$title="上冰山安全鞋";
		break;
	case "delta_fusion":
		$title="下火海安全鞋";
		break;
	case "alain_alex":
		$title="气密防化服穿戴";
		break;
	case "harness_evo":
		$title="舒适款安全带";
		break;
	case "absorber":
		$title="减震绳";
		break;
	case "retractable":
		$title="防坠制动器";
		break;
	case "ascab":
		$title="垂直系统安装";
		break;
	case "y0128ev2wu7":
		$title="这才是真正的安全帽！牛！代尔塔安全帽测试！";
		break;
	case "q013195gyfw":
		$title="代尔塔 安全帽 激光印字 定制你的专属安全帽";
		break;
	case "v0160laggxj":
		$title="躯体防护的生产及检测介绍";
		break;
	case "e0128wxcaev":
		$title="高大上宣传片！代尔塔公司集团宣传片";
		break;
	case "a0128j4uimn":
		$title="代尔塔时尚工装show-模特走秀视频（展会）";
		break;
	case "k0147ihklk1":
		$title="2015代尔塔年会创意节目《板·戏》感谢你";
		break;
	case "d01552amj6l":
		$title="代尔塔集团来华视频《欢迎你》";
		break;
	case "r0139nl357u":
		$title="代尔塔 M1195VB口罩 N95 检测视频";
		break;
	case "h0142cksr5b":
		$title="代尔塔Brise de Provence空气净化器检测视频";
		break;
	case "n0160iz8ij9":
		$title="钢水测试视频";
		break;
	case "j0160ral4vx":
		$title="代尔塔HAR系列安全带升级说明";
		break;
	case "k0128f6crhe":
		$title="TR004绞盘与三脚架的安装演示说明";
		break;
	case "b01603ux9z2":
		$title="安全带-减震带/减震绳产品说明";
		break;
	case "d0128w94abo":
		$title="TR007防坠制动器+三角架+固定卡座的使用说明";
		break;
	case "b01419ohylt":
		$title="代尔塔高空必备安全带";
		break;
	case "v01602d6hfo":
		$title="救援演练救援场景模拟";
		break;
	case "k01404rfvnx":
		$title="代尔塔手控下降器产品介绍及使用方法";
		break;
	case "c0128kh65gr":
		$title="攀岩、逃生墙、巨人梯-代尔塔员工素质拓展训练";
		break;
	case "x0323ouwq4e":
		$title="感受原版：对不起，我是欧标鞋-沙画宣传片";
		break;
	default :
		$title = "delta plus China";
}
echo "<title>".$title."</title>";
?>
</head>
<body>
<div id="content">
<?php
   include("video/".$video.".html");
?>
</div>
<div id="footer"><span>全球防护&nbsp本地服务</span><img src="logo.jpg" /></div>		
</body>
</html>
