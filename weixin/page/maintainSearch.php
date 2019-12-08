<!-- js日期框：专用于IE -->
<script src="js/Calendar.js"></script>
<script>
	if ("ActiveXObject" in window)  //妈的，微软的东西老是多变，升到IE11日期框就不能用了，必须这样才能用
	{
		window.addEventListener("load",showDateBox,false);
		function showDateBox()
		{
			document.getElementById('dateBox').className="show";
			document.getElementById('dateBox2').className="show";
		}
	}
</script>

<div class="edge3">

    <?php

    include "validateUser.php";
    include "head.php";

    ?>

    <p class="alignCenter fontStyle3">管理控制中心</p>
	<p class="fontStyle3">产品维护和年检申请查询</p>
	<form action="" method="post" name="form_search">
		<table>
			<tr><td class="inputLeftTextWidth">开始日期：</td>
				<td><input style="float:left" class='width168' type="date" name="dateFrom" />
					<a style="float:left;margin:3px" id="dateBox" class="hide"  href="javascript:show_calendar('form_search.dateFrom');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
						<img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="开始日期" />
					</a>
				</td>
				<td class="inputLeftTextWidth">结束日期：</td>
				<td><input style="float:left" class='width168' type="date" name="dateTo" />
					<a style="float:left;margin:3px" id="dateBox2" class="hide"  href="javascript:show_calendar('form_search.dateTo');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
						<img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="结束日期" />
					</a>
				</td>
			</tr>
		</table>
		<p><input type="submit" name="searchMaintainRequest" value="搜索" /></p>
	</form>

	<?php

    include_once 'connectDB.php';

	if (isset($_REQUEST['searchMaintainRequest']))
	{
		$_REQUEST['dateFrom']==""?$dateFrom="0000-00-00":$dateFrom=$_REQUEST['dateFrom'];
		$_REQUEST['dateTo']==""?$dateTo="9999-12-31":$dateTo=$_REQUEST['dateTo'];	//实际测试mysql中日期上限必须要用真实存在日期不能用诸如9999-99-99

        $sql = "select a.id,(case maintainRequestType when 1 then '经销商' else '终端客户' end) as maintainRequestType,a.company,a.contact,a.email,a.phone,b.describ,a.buyWay,a.usedClient,a.batchNumber,a.product,a.quantity,a.buyTime,a.usedTime,a.usedCondition,a.requestContent,a.files
        			from maintainrequest as a
        			left join productclass as b on b.id=a.productClass
        			where a.logTime between '$dateFrom' and '$dateTo'
                    order by a.id desc";
			$result=mysql_query($sql);
			if (!$result)
			{
				exit("遇到错误，请重新查询！\n".mysql_error());
			}

			if (mysql_num_rows($result)>0)
			{
				echo "<table class='tableStyle1' cellspacing='0' border='1'>
            			<tr>
            				<th>id</th>
            				<th>您是经销商还是终端使用客户？</th>
            				<th>公司名</th>
            				<th>联系人</th>
            				<th>邮箱</th>
            				<th>电话</th>
            				<th>可申请的产品类别（请选择）</th>
            				<th>购买渠道</th>
            				<th>使用终端客户</th>
            				<th>产品批号</th>
            				<th>产品型号</th>
            				<th>数量</th>
            				<th>购买时间</th>
            				<th>实际开始使用时间</th>
            				<th>使用状况及频率</th>
            				<th>申请内容</th>
            				<th>上传使用环境和产品批号照片（最多5张）</th>
            				<th></th>
            			</tr>";
				while($row=mysql_fetch_row($result))
				{
					echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>                    
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>$row[6]</td>
                    <td>$row[7]</td>
                    <td>$row[8]</td>
                    <td>$row[9]</td>
                    <td>$row[10]</td>
                    <td>$row[11]</td>
                    <td>$row[12]</td>
                    <td>$row[13]</td>
                    <td>$row[14]</td>
                    <td>$row[15]</td>
                    <td>$row[16]</td>                    
                    <td style='text-align: center'><button style='color:red;font-weight:bold;width:112px;' onclick='window.open(\"index.php?page=maintainRequestView&apply=1&maintainRequestId=$row[0]\")'>查看</button></td>                
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