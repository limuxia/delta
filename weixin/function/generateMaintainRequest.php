<?php
require_once 'connectDB.php';
function generateMaintainRequest($_maintainRequestId)
{
    $projectHtml="<style type='text/css'>/*专用于在邮件中显示以下内容，但实际有些效果不起作用*/

                    .paddingLeftRight{padding:0 6px 0 6px;}

                    .fontStyle3{font-weight:bold;font-size:20px;}

                    .titleStyle1{background-color:#C0C0C0;line-height:30px;height:30px;text-align: center;}

                    .tableStyle1{width:100%;border-collapse:collapse;margin:10px 0;}

                    .tableStyle1 th,.tableStyle1 td{border:1px solid black;}

                    .fontStyle2{font-family:KaiTi;}

                    .floatRight{display:block;float:right;}

                    .clearFloat{clear:both;}

                </style>";

//单头数据
    $sql = "select (case maintainRequestType when 1 then '经销商' else '终端客户' end) as maintainRequestType,a.company,a.contact,a.email,a.phone,b.describ,a.buyWay,a.usedClient,a.batchNumber,a.product,a.quantity,a.buyTime,a.usedTime,a.usedCondition,a.requestContent,a.files
        			from MAINTAINREQUEST as a
        			left join PRODUCTCLASS as b on b.id=a.productClass
        			where a.id=$_maintainRequestId";
    $result = mysql_query($sql);
    if (!$result) {
        return("生成内容失败，您可登入管理后台查看该数据，错误信息：\n\t" . mysql_error());
    }

    if (mysql_num_rows($result)) {
        $projectHtml .= "<div class='paddingLeftRight'>
                            <table class='tableStyle1'>
                                <tr class='titleStyle1'><td colspan='4'>产品维护和年检申请</td></tr>";
        $row = mysql_fetch_row($result);
        $projectHtml .= "<tr><td colspan='2'>您是经销商还是终端使用客户？</td><td colspan='2'>$row[0]</td></tr>
                        <tr><td>公司名</td><td>$row[1]</td><td>联系人</td><td>$row[2]</td></tr>
                        <tr><td>邮箱</td><td>$row[3]</td><td>电话</td><td>$row[4]</td></tr>
						<tr><td colspan='2'>可申请的产品类别（请选择）</td><td colspan='2'>$row[5]</td></tr>";

        if($row[0]=="经销商")
        {
            $projectHtml .= "<tr><td>使用终端客户</td><td>$row[7]</td>";
        }
        elseif($row[0]=="终端客户")
        {
            $projectHtml .= "<tr><td>购买渠道</td><td>$row[6]</td>";
        }

        $projectHtml .= "    <td>产品批号</td><td>$row[8]</td></tr>
                        <tr><td>产品型号</td><td>$row[9]</td><td>数量</td><td>$row[10]</td></tr>
						<tr><td>购买时间</td><td>$row[11]</td><td>实际开始使用时间</td><td>$row[12]</td></tr>
					    <tr><td>使用状况及频率</td><td colspan='3'>$row[13]</td></tr>
            		    <tr><td>申请内容</td><td colspan='3'>$row[14]</td></tr>
            		    <tr><td colspan='2'>上传使用环境和产品批号照片（最多5张）</td><td colspan='2'>";

        //strtok()的用法：不是把分割后的字符串放进一个数组，而是每一个字符串要调用一次strtok，只是除了第一次带string参数，后续调用不能带string参数只需要一个分割符参数
        $file = strtok($row[15], ',');
        while ($file != "")    //只要文件存在
        {
            $projectHtml .= "<a target='_blank' href='upload/maintainRequest/$file'>$file</a><br />";
            $file = strtok(',');  //再次调用不能带string参数
        }

        $projectHtml .= "</td></tr>
        		    </table>        		    
                    <p class='fontStyle2'>请详细的填写，以便我们及时有效的进行维护判断。稍后邮件回复是否接受维修或年检并报价。</p>
        		  </div>";
    }
    return $projectHtml;
}
?>