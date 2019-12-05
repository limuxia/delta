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

	<p class="fontStyle3">投诉报告查询</p>
	<form action="" method="post" name="form_search">
		<table>
			<tr><td class="inputLeftTextWidth">开始日期：</td>
				<td><input style="float:left" name="dateFrom" type="date" />
					<a style="display:none;float:left;margin:3px" id="dateBox" href="javascript:show_calendar('form_search.dateFrom');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
						<img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="开始日期" />
					</a>
				</td>
			</tr>
			<tr>
				<td class="inputLeftTextWidth">结束日期：</td>
				<td><input style="float:left" name="dateTo" type="date" />
					<a style="display:none;float:left;margin:3px" id="dateBox2" href="javascript:show_calendar('form_search.dateTo');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
						<img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="结束日期" />
					</a>
				</td>
			</tr>
		</table>
		<p><input type="submit" name="searchComplain" value="搜索" /></p>
	</form>

	<?php

	//查询处理
	include_once 'connectDB.php';

	if (isset($_REQUEST['searchComplain']))
	{
		$_REQUEST['dateFrom']==""?$dateFrom="0000-00-00":$dateFrom=$_REQUEST['dateFrom'];
		$_REQUEST['dateTo']==""?$dateTo="9999-12-31":$dateTo=$_REQUEST['dateTo'];	//实际测试mysql中日期上限必须要用真实存在日期不能用诸如9999-99-99

			$sql="select *
        			from COMPLAIN
        			where writeTime between '$dateFrom' and '$dateTo'
        			order by id desc";
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
            				<th>购买方式</th>
            				<th>线上平台</th>
            				<th>经销商名称/网上店铺名</th>
            				<th>终端公司名称</th>
            				<th>联系人</th>
            				<th>电话</th>
            				<th>邮箱</th>
            				<th>代尔塔产品型号</th>
            				<th>出问题数量</th>
            				<th>产品批号 *1</th>
            				<th>此批累计使用时间</th>
            				<th>使用环境及作业场所尽可能详尽描述</th>
            				<th>具体投诉内容 *2</th>
            				<th>上传图片</th>
            				<th>投诉时间</th>
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
                    <td>{$row[12]}</td>
                    <td>{$row[13]}</td>
                    <td>";

        			//strtok()的用法：不是把分割后的字符串放进一个数组，而是每一个字符串要调用一次strtok，只是除了第一次带string参数，后续调用不能带string参数只需要一个分割符参数
        			$file = strtok($row[14], ',');
       				while ($file != "")    //只要文件存在
        			{
            			echo "<a target='_blank' href='upload/complain/$file'>$file</a><br />";
            			$file = strtok(',');  //再次调用不能带string参数
        			}

					echo "</td>
							<td>{$row[15]}</td>                   
                            <td style='text-align: center'><button style='color:red;font-weight:bold;width:112px;' onclick='window.open(\"index.php?page=complainView&apply=1&complainId=$row[0]\")'>查看</button></td>                
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