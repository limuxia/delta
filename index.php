<?php
	session_start();
?>

<!DOCTYPE html>

<SCRIPT LANGUAGE='JavaScript'>
function verifier(f)
{
	if(f.login.value=="" || f.mdp.value=="")
	{
		alert("请输入查询关键字 !!");
		return false;
	}
	return true;
}
</SCRIPT>

<?php
	$dir=isset($_REQUEST['dir']) ? $_REQUEST['dir'] : "";
	$page=isset($_REQUEST['page']) ? $_REQUEST['page'] : "welcome";
/*用于打开网站首页前弹出通知信息：
	if ($page=="welcome") echo '<script>alert("                                   郑 重 声 明\r\n'.
				'    法国代尔塔集团是一家集团化的PPE生产制造企业，取得代尔塔正式授权的单位或个人方能合法地在中国境内进行经销。代尔塔不承认任何形式的转授权及二次经销授权。\r\n\r\n'.
    			'    代尔塔目前仅在天猫及京东开设<代尔塔官方旗舰店>。除此之外，任何以代尔塔名义在虚拟平台、电商或网站上的经销行为均未取得代尔塔授权，属于非法经销，我们将依法追究其责任。\r\n\r\n'.
				'代尔塔天猫旗舰店：http://deltaplus.tmall.com\r\n'.
				'代尔塔京东旗舰店：http://deltaplus.jd.com\r\n\r\n'.
				'                                      法国代尔塔集团\r\n'.
				'                                      代尔塔(中国)安全防护有限公司\r\n'.
				'                                      2015年4月3日");</script>';
*/
?> 

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="description" content="" />
	<meta name="keywords" content="安全鞋, 防砸, 防穿刺, 防静电, 绝缘, 耐高温, 耐磨, 耐油, 防滑, 透气, PU, 橡胶, 安全靴, 防化靴, 防寒, 安全带, 减震绳, 三脚架, 安全绳, 上升器, 下降器, 安全钩, 速差器, 防化服, 气密, 液密, 重型, 镀铝隔热服, 防火防化服, 1000度, 阻燃服, 防静电, 雨衣, 防寒服, 零下20度, 工作服, 荧光服, 焊工, 冷库防寒服, 防护手套, 氯丁橡胶, 丁腈, 天然乳胶, PVC, PU涂层, 防割, 耐磨, 防撕裂, 防穿刺, 隔热, 防静电, 防油, 防滑, 防化, 耐高温, 防寒, 绝缘, 防水, 焊工, 套袖, 一次性, 呼吸器, 全面罩, 半面罩, 过滤罐, 过滤盒, 滤棉, 防尘口罩, 活性炭, 洗眼器, 变光面罩, 面屏, 护目镜, 耳塞, 耳罩, 安全帽, ABS, PE" />
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>Delta Plus China - 代尔塔中国</title>
	</head>
<body>
<div id="main">
	<div id="header">
		<a href="index.php?dir=&page=welcome"><img src="pictures/framework/framework_top.jpg"></a>
	</div>
	<div class="menu">
		<div class="menu_top">
			<li><a href="index.php?dir=delta_group&page=presentation"><font color="FFFF00">代尔塔集团</font></a></li>
			<li><a href="index.php?dir=&page=delta_ch"><font color="#FFFF00">代尔塔中国</font></a></li>
			<li><a href="index.php?dir=&page=delta_calendar"><font color="#FFFF00">代尔塔日历</font></a></li>
			<li><a href="index.php?dir=&page=recruitments"><font color="#FFFF00">招聘信息</font></a></li>
			<li><a href="index.php?dir=&page=contact"><font color="#FFFF00">联系我们</font></a></li>
			<li><a href="index.php?dir=page&page=activity"><font color="#FFFF00">活动专区</font></a></li>
            <li><a href="http://deltaplus.tmall.com/"><font color="#FFFF00">天猫旗舰店</font></a></li>
            <li><a href="http://deltaplus.jd.com/"><font color="#FFFF00">京东旗舰店</font></a></li>
			<br><br>
			<img src="pictures/framework/menu2.jpg"><br><br>
			<li><a href="index.php?dir=&page=catalog"><font color="#FFFF00">产品目录</font></a></li>
			<li><a href="index.php?dir=&page=new_products"><font color="#FFFF00">电子目录及单页</font></a></li>
			<li><a href="index.php?dir=&page=video"><font color="#FFFF00">产品视频</font></a></li>
			<li><a href="index.php?dir=&page=solution"><font color="#FFFF00">行业解决方案</font></a></li>
			<li><a href="index.php?dir=&amp;page=train"><font color="#FFFF00">防坠拓展中心</font></a></li>
			<li><a href="index.php?dir=&page=askanswer"><font color="#FFFF00">产品知识问答</font></a></li>
			<li><a href="index.php?dir=&page=changenotice"><font color="#FFFF00">产品变更公告</font></a></li>
			<br><br>
			<img src="pictures/framework/menu3.jpg"><br><br>
			<li><a href="index.php?dir=partner&page=tech_info"><font color="#FFFF00">资料下载</font></a></li>
			<li><a href="index.php?dir=partner&page=after_sales"><font color="#FFFF00">技术支持</font></a></li>
				<form method="post" action="index.php?dir=partner&page=auth">
					<table>
						<tr>
							<td><font color="#FFFF00">用户名:</font></td>
							<td><input type="text" name="login" size="4" maxlength="10"/></td>		
						</tr>
						<tr>
							<td><font color="#FFFF00">密码:</font></td>
							<td><input type="password" name="mdp" size="4" maxlength="10"/></td>
						</tr>
						<tr align="center">
							<td colspan="2"><input type="reset" value="重置" />&nbsp;&nbsp;&nbsp;<input type="submit" value="登录" name="valid" OnClick='return verifier(this.form)'/></td>
						</tr>
					</table>
				</form>
		</div>
		<div class="menu_bottom">
			<br />
                <!-- <font color="#FFFF00">您是第1533690位来客</font> -->
		</div>		
	</div>
	<div id="tit_incl_foot"><!-- 固定定位框架 -->

	<?php

		if ($page=='presentation'||$page=='history'||$page=='dist_log'||$page=='mission'){
			echo '<div class="title">
                    <table>
						<tr>
							<td style="border-right:2px solid black;"><a href="index.php?dir=delta_group&page=presentation">集团概述</a></td>
							<td style="border-right:2px solid black;"><a href="index.php?dir=delta_group&page=history">集团历史</a></td>
							<td style="border-right:2px solid black;"><a href="index.php?dir=delta_group&page=dist_log">分销物流</a></td>
							<td><a href="index.php?dir=delta_group&page=mission">代尔塔使命</a></td>
						</tr>
					</table>
					</div>';
		}
		elseif ($page=='delta_ch') {
			echo '<div class="title">
					<table>
						<tr><td>代尔塔中国</td></tr>
					</table>
				</div>';
		}
		elseif ($page=='delta_calendar') {
			echo '<div class="title">
					<table>
						<tr><td>代尔塔日历</td></tr>
					</table>
				</div>';
		}
		elseif ($page=='recruitments') {
			echo '<div class="title">
					<table>
						<tr><td>招聘信息</td></tr>
					</table>
				</div>';
		}		
		elseif ($page=='recruitments_descr') {
			echo '<div class="title">
					<table>
						<tr><td><a style="display:block;float:right;margin-right:40px;" href="index.php?dir=&page=recruitments">招聘信息</a></td></tr>
					</table>
				</div>';
		}		
		elseif ($page=='contact') {
			echo '<div class="title">
					<table>
						<tr><td>联系我们</td></tr>
					</table>
				</div>';
		}
		elseif ($page=='activity') {
			echo '<div class="title">
					<table>
						<tr><td>活动专区</td></tr>
					</table>
				</div>';
		}
		elseif ($page=='catalog') {
			echo '<div class="title">
					<table>
						<tr><td>产品目录</td></tr>
					</table>
				</div>';
		}		
		elseif ($page=='head'||$page=='gloves'||$page=='wk_clothes'||$page=='fall_arrest'||$page=='respiratory'||$page=='shoes'||$page=='tec_clothes'||$page=='search'||$page=='printsearch') {
			echo '<div class="title">
					<table>
						<tr><td><a style="display:block;float:right;margin-right:40px;" href="index.php?dir=&page=catalog">回到目录</a></td></tr>
					</table>
				</div>';
		}		
		elseif ($page=='new_products') {
			echo '<div class="title">
					<table>
						<tr><td>电子目录及单页</td></tr>
					</table>
				</div>';
		}				
		elseif ($page=='video') {
			echo '<div class="title">
					<table>
						<tr><td>产品视频</td></tr>
					</table>
				</div>';
		}	
		elseif ($page=='solution') {
			echo '<div class="title">
					<table>
						<tr><td>解决方案</td></tr>
					</table>
				</div>';
		}			
		elseif ($page=='promotion') {
			echo '<div class="title">
					<table>
						<tr><td>行业推荐</td></tr>
					</table>
				</div>';
		}				
		elseif ($page=='train') {
			echo '<div class="title">
					<table>
						<tr><td>防坠拓展中心</td></tr>
					</table>
				</div>';
		}				
		elseif ($page=='askanswer') {
			echo '<div class="title">
					<table>
						<tr><td>产品知识问答</td></tr>
					</table>
				</div>';
		}					
		elseif ($page=='changenotice') {
			echo '<div class="title">
					<table>
						<tr><td>产品变更公告</td></tr>
					</table>
				</div>';
		}					
		elseif ($page=='tech_info') {
			echo '<div class="title">
					<table>
						<tr><td>资料下载</td></tr>
					</table>
				</div>';
		}						
		elseif ($page=='after_sales') {
			echo '<div class="title">
					<table>
						<tr><td>技术支持</td></tr>
					</table>
				</div>';
		}							
		elseif ($page=='auth') {
			echo '<div class="title">
					<table>
						<tr><td>技术信息和售后服务</td></tr>
					</table>
				</div>';
		}

	?>

        <div class="including">

        <?php

            if($dir=="page")
            {
                include("$dir/$page.php");
            }
            elseif($dir=="activity")
            {
                include("page/$dir/$page.html");
            }
            else{
                include($dir."/dc_".$page.".php");
            }

        ?>

        </div>
        <div id="footer">
            <div>
              <hr />
              <a href="http://www.deltaplus.com.cn"><img src="pictures/framework/china.JPG" /></a>
              <a href="http://www.deltaplus.fr"><img src="pictures/framework/france.jpg" /></a>
              <a href="mailto:sales@deltaplus.com.cn">代尔塔（中国）安全防护有限公司 Delta Plus China Co.,Ltd.</a>
              <a href="http://www.miibeian.gov.cn"> 苏ICP备05082218号</a>
            </div>
            <div id="plus">
              <a href="index.php?dir=stat&page=showstat">A</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>