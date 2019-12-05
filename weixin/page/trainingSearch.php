<!-- js日期框：专用于IE -->
<script src="js/Calendar.js"></script>
<script>
	if ("ActiveXObject" in window)  //妈的，微软的东西老是多变，升到IE11日期框就不能用了，必须这样才能用
	{
		window.addEventListener("load",showDateBox,false);
		function showDateBox()
		{
			document.getElementById('dateBox').style.display="block";
			document.getElementById('dateBox2').style.display="block";
		}
	}
</script>

<div class="edge3">

    <?php

    include "validateUser.php";
    include "head.php";

    ?>

    <p class="fontStyle3">培训申请查询</p>
	<form action="" method="post" name="form_search">
		<table>
			<tr><td>培训方式</td><td><input type="radio" name="trainingWay" value="来代尔塔公司培训" />来代尔塔公司培训<input type="radio" name="trainingWay" value="去贵司现场培训" />去贵司现场培训<input type="radio" name="trainingWay" value="" checked />全部</td></tr>
			<tr><td class="inputLeftTextWidth">开始日期：</td>
				<td><input style="float:left" name="dateFrom" type="date" />
					<a style="display:none;float:left;margin:3px" id="dateBox"  href="javascript:show_calendar('form_search.dateFrom');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
						<img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="开始日期" />
					</a>
				</td>
			</tr>
			<tr><td class="inputLeftTextWidth">结束日期：</td>
				<td><input style="float:left" name="dateTo" type="date" />
					<a style="display:none;float:left;margin:3px" id="dateBox2"  href="javascript:show_calendar('form_search.dateTo');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
						<img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="结束日期" />
					</a>
				</td>
			</tr>
			<tr><td>培训对象</td><td><input type="radio" name="areYou" value="经销商" />经销商<input type="radio" name="areYou" value="终端客户" />终端客户<input type="radio" name="areYou" value="" checked />全部</td></tr>
		</table>
		<p><input type="submit" name="searchTraining" value="搜索" /></p>
	</form>

	<?php

	//查询处理
	include_once 'connectDB.php';

	if (isset($_REQUEST['searchTraining']))
	{
		$_REQUEST['trainingWay']==""?$trainingWay=" ":$trainingWay=" and trainingWay='{$_REQUEST['trainingWay']}' ";
		$_REQUEST['dateFrom']==""?$dateFrom="0000-00-00":$dateFrom=$_REQUEST['dateFrom'];
		$_REQUEST['dateTo']==""?$dateTo="9999-12-31":$dateTo=$_REQUEST['dateTo'];	//实际测试mysql中日期上限必须要用真实存在日期不能用诸如9999-99-99
		$_REQUEST['areYou']==""?$areYou=" ":$areYou=" and areYou='{$_REQUEST['areYou']}' ";

			$sql="select *
        			from TRAINING
        			where hopeDate between '$dateFrom' and '$dateTo'
        			$trainingWay
        			$areYou
        			order by hopeDate";
			$result=mysql_query($sql);
			if (!$result)
			{
				exit("遇到错误，请重新查询！\n".mysql_error());
			}

			if (mysql_num_rows($result)>0)
			{
				echo "<table class='tableStyle1'>
            			<tr>
            				<th>id</th>
            				<th>培训方式</th>
            				<th>培训地址</th>
            				<th>时长</th>
            				<th>希望日期</th>
            				<th>希望了解的产品线（多选框）</th>
            				<th>培训要求</th>
            				<th>您的公司名</th>
            				<th>联系人</th>
            				<th>邮箱</th>
            				<th>电话</th>
            				<th>您是？</th>
            				<th></th>
            			</tr>";
				while($row=mysql_fetch_row($result))
				{
					//单头数据
					echo "<tr>
					    <td>{$row[0]}</td>
                        <td>{$row[1]}</td>
                        <td>{$row[2]}</td>
                        <td>{$row[3]}</td>
                        <td>{$row[4]}</td>
                        <td>{$row[5]}</td>
                        <td>{$row[6]}</td>
                        <td>{$row[7]}</td>
                        <td>{$row[8]}</td>
                        <td>{$row[9]}</td>
                        <td>{$row[10]}</td>
					    <td>{$row[11]}</td>                  
                        <td style='text-align: center'><button style='color:red;font-weight:bold;width:112px;' onclick='window.open(\"index.php?page=trainingView&apply=1&trainingId=$row[0]\")'>查看</button></td>                
                    </tr>";
				}

				echo "</table>";
			}
			else
			{
				exit("未查询到任何数据或关键字无效！");
			}
	}

	?>

</div>