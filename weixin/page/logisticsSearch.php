<script>
function verifier(input)
{
	if(input.value=="")
	{
		alert("不能为空!!");
		input.onfocus;
		return false;
	}
	return true;
}
</script>
<div id="logisticsStyle">
<img src="pictures/logo2.jpg" />
<form method="post" action="" onsubmit='return verifier(this.word)'>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td><input class="inputStyle1" type="text" name="word" placeholder="请输入订单号" /><input class="buttonStyle1" type="submit" value="查 询" />
			</td>
		</tr>
		<tr><td class="fontStyle1"><p>只支持15天内物流跟踪</p></td></tr>
	</table>
    <p>查询电话：0512-63648705</p>
</form>

<?php
	if(isset($_POST['word']))
	{
		$word = $_POST["word"];
		echo "<hr /><p>";
		include('../config/dbconnect.php');
		$sql = "SELECT a.logisticsCode,c.apiCode,a.logisticsCompany,b.time1,b.time2,b.time3,b.time4,b.time5 FROM weixin_salesorder as a
				left join weixin_logistics as b on b.code=a.logisticsCode
				left join weixin_logisticscompany as c on c.innerCode=a.logisticsCompany
				WHERE a.orderNo='$word'";
		$req = mysql_query($sql) or die('Erreur SQL !' . $sql . '' . mysql_error());
		if (mysql_num_rows($req) > 0)
		{
			$data = mysql_fetch_array($req);
			if (strtoupper($data[2]) == 'CS')
			{
				if($data[3]!=''){	//至少会存在第一个物流时间信息，如果没有则无物流信息
					for($i=7;$i>2;$i--)
					{
						if($data[$i]!="")
						{

							if($i==4)
							{
								echo "$data[$i] （蔡氏物流：400-066-9256）<br /><br />";
							}
							elseif($i==3)
							{
								echo "$data[$i] 提货装车";
							}
							else
							{
								echo "$data[$i]<br /><br />";
							}
						}
					}
				}
				else
				{
					echo "暂无物流信息，请稍后查询";
					exit;
				}
			}
			else
			{
				include ("function/KdApiSearch.php");
				$jsonObj=json_decode(getOrderTracesByJson($data[1],$data[0]));
				if($jsonObj->{'Success'})
				{
					$traceArray=$jsonObj->{'Traces'};
					$i=count($traceArray);
					if($i>0)
					{
						for(--$i;$i>=0;$i--)
						{
							echo $traceArray[$i]->{'AcceptTime'}." ".$traceArray[$i]->{'AcceptStation'}." ".$traceArray[$i]->{'Remark'}."<br /><br />";
						}
					}
					else
					{
						echo $jsonObj->{'Reason'};
					}
				}
				else
				{
					echo $jsonObj->{'Reason'};
				}
			}
		}
		else
		{
			echo "您输入的订单号有误或超出查询周期，请重新输入。";
			exit;
		}
		mysql_close();
		echo "</p>";
	}
?>
	</div>