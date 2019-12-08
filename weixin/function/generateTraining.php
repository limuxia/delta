<?php

function generateTraining($trainingId)
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
    $sql = "select * from training where id='$trainingId'";
    $result = mysql_query($sql);
    if (!$result) {
        return("生成内容失败，您可登入管理后台查看该数据，错误信息：\n\t" . mysql_error());
    }

    if (mysql_num_rows($result))
    {
        $row=mysql_fetch_row($result);

        $outputHtml.="<div class='paddingLeftRight'>
                        <table class='tableStyle1'>
                            <tr class='titleStyle1'><th colspan='4'>培训申请</th></tr>
                            <tr><td>$row[1]</td><td>培训地址</td><td colspan='2'>$row[2]</td></tr>
                            <tr><td>时长</td><td>$row[3]</td><td>希望日期</td><td>$row[4]</td></tr>
                            <tr><td>希望了解的产品线（多选框）</td><td colspan='3'>$row[5]</td></tr>
                            <tr><td>培训要求</td><td colspan='3'>$row[6]</td></tr>
                            <tr><td>您的公司名</td><td>$row[7]</td><td>联系人</td><td>$row[8]</td></tr>
                            <tr><td>邮箱</td><td>$row[9]</td><td>电话</td><td>$row[10]</td></tr>
                            <tr><td>您是？</td><td colspan='3'>$row[11]</td></tr>
                        </table>
					</div>";
    }
    return $outputHtml;
}
?>