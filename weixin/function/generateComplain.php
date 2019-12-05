<?php

function generateComplain($complainId)
{
    $outputHtml="<style type='text/css'>/*专用于在邮件中显示以下内容，但实际有些效果不起作用*/

                    .paddingLeftRight{padding:0 6px 0 6px;}

                    .fontStyle3{font-weight:bold;font-size:20px;}

                    .titleStyle1{background-color:#C0C0C0;line-height:30px;height:30px;text-align: center;}

                    .tableStyle1{width:100%;border-collapse:collapse;margin:10px 0;}

                    .tableStyle1 th,.tableStyle1 td{border:1px solid black;}

                    .fontStyle1{font-family:KaiTi;color:gray;}

                    .fontStyle2{font-family:KaiTi;}

                    .floatRight{display:block;float:right;}

                    .clearFloat{clear:both;}

                </style>";

    //单头数据
    $sql = "select * from COMPLAIN where id='$complainId'";
    $result = mysql_query($sql);
    if (!$result) {
        return("生成内容失败，您可登入管理后台查看该数据，错误信息：\n\t" . mysql_error());
    }

    if (mysql_num_rows($result))
    {
        $outputHtml.="<div class='paddingLeftRight'>
                            <p class='fontStyle3'>投诉报告</p>
                            <table class='tableStyle1'>
                                <tr class='titleStyle1'><td colspan='4'>购买渠道</td></tr>";

        $row=mysql_fetch_row($result);

        if($row[1]=="网上")
        {
            $outputHtml.="<tr><td>网上平台</td><td>$row[2]</td><td>店铺名称</td><td>$row[3]</td></tr>";
        }
        else
        {
            $outputHtml.="<tr><td>经销商名称</td><td>$row[3]</td><td></td><td></td></tr>";
        }

            $outputHtml.="<tr class='titleStyle1'><td colspan='4'>投诉终端客户信息</td></tr>";

            $outputHtml.="<tr><td>公司名称</td><td>$row[4]</td><td>联系人</td><td>$row[5]</td></tr>
            <tr><td>电话</td><td>$row[6]</td><td>邮箱</td><td>$row[7]</td></tr>
            <tr class='titleStyle1'><td colspan='4'>产品质量投诉</td></tr>
            <tr><td>代尔塔产品型号</td><td>$row[8]</td><td>出问题数量</td><td>$row[9]</td></tr>
            <tr><td>产品批号 *1</td><td>$row[10]</td><td>此批累计使用时间</td><td>$row[11]</td></tr>
            <tr><td>使用环境及作业场所<br />
                    <font class='fontStyle1'>(尽可能详尽描述)</font></td>
                <td colspan='3'>$row[12]</td>
            </tr>
            <tr><td>具体投诉内容 *2</td><td colspan='3'>$row[13]</td></tr>
            <tr><td>上传图片 *3</td><td colspan='3'>";
            //strtok()的用法：不是把分割后的字符串放进一个数组，而是每一个字符串要调用一次strtok，只是除了第一次带string参数，后续调用不能带string参数只需要一个分割符参数
            $file = strtok($row[14], ',');
            while ($file != "")    //只要文件存在
            {
                $outputHtml.= "<a target='_blank' href='upload/complain/$file'>$file</a><br />";
                $file = strtok(',');  //再次调用不能带string参数
            }

            $outputHtml.="</td></tr>
                     </table>
        		       <p class='fontStyle1'>*1 产品批号请见产品包装，如：11/HS/CH52<br />
                           *2 如为安全鞋产品，请说明尺码和具体问题部位：<br />
                              鞋面、内衬、防砸包头、防穿刺中底、配件、脱胶、水解、舒适度等<br />
                           *3 请尽可能提供含产品标签的照片</p>
					</div>";
    }
    return $outputHtml;
}
?>