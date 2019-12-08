<?php
//error_reporting(E_ALL & E_STRICT);    // php5开始，增加 E_STRICT 并不包含在 E_ALL 之中，所以额外启用
error_reporting(E_ALL & ~E_DEPRECATED & E_STRICT);  //wamp2.5不或不能很好支持php5.3，因此取消此“在未来版本中可能无法正常工作的代码给出警告”

$page="";
if (isset($_REQUEST['page']))
{
	$page=$_REQUEST['page'];
}
// 查看标准页直接跳转退出当前脚本
if($page=='standard'){	
	//require('page/'.$page.'.php');
	// 直接跳转
	header("Location: page/standard/{$_REQUEST['standard']}.html");	
	exit;
}

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
$title="";
switch ($page){
	//动态页
	case "manageCenter":
		$title="管理控制中心";
		break;
    case "maintainRequest":
        $title="产品维护和年检申请";
        break;
    case "maintainRequestView":
        $title="产品维护和年检申请处理";
        break;
    case "maintainSearch":
        $title="产品维护和年检申请查询";
        break;
	case "training":
		$title="培训申请";
		break;
    case "trainingView":
        $title="培训申请处理";
        break;
	case "trainingSearch":
		$title="培训申请查询";
		break;
	case "complain":
		$title="投诉报告";
		break;
    case "complainView":
        $title="投诉报告处理";
        break;
	case "complainSearch":
		$title="投诉报告查询";
		break;
	case "franchiser":
		$title="信息反馈";
		break;
	case "vip":
		$title="VIP用户";
		break;
	case "activity":
		$title="活动注册";
		break;
	case "logisticsSearch":
		$title="销售订单物流查询";
		break;

	//静态页
    case "shop":
		$title="官方旗舰店";
		break;
    case "download":
        $title="产品介绍";
        break;
    case "answerClass":
        $title="知识问答";
        break;
    case "answer":
        $title="知识问答";
        break;
	case "video":
		$title="产品视频";
		break;
	case "video_enterprise":
		$title="集团简介";
		break;
	case "video_head":
		$title="头面听防护";
		break;
	case "video_respirator":
		$title="呼吸防护";
		break;
	case "video_hand":
		$title="手部防护";
		break;
	case "video_openAirClothes":
		$title="工装户外服";
		break;
	case "video_foot":
		$title="足部防护";
		break;
	case "video_technologyClothes":
		$title="高科技防护服";
		break;
	case "video_fall":
		$title="坠落防护";
		break;
	case "job":
		$title="作业风险";
		break;
	case "riskGuard":
		$title="风险防护";
		break;
	case "guardData":
		$title="防护标准与产品";
		break;
	case "standard":
		$title="防护标准";
		break;
	default:
		$page="job";
		$title="作业风险";
}
echo "<title>".$title."</title>";
?>
</head>
<body>
<div id="mainBody">
<?php
	if ($page!="")
	{
   		include("page/".$page.".php");
	}
?>
</div>
<div id="footer"><span>PPE&nbsp安全顾问<br/><font size="0.5">仅作参考，不承担因此引起的法律责任</font></span><img src="pictures/logo.jpg" /></div>
</body>
</html>