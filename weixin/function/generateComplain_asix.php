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
    $sql = "select * from complain_asix where id='$complainId'";
    $result = mysql_query($sql);
    if (!$result) {
        return("生成内容失败，您可登入管理后台查看该数据，错误信息：\n\t" . mysql_error());
    }

    if (mysql_num_rows($result))
    {
        $outputHtml.="<div class='paddingLeftRight'>
                            <p class='fontStyle3'>Quality complaint</p>
                            <table class='tableStyle1'>";

        $row=mysql_fetch_row($result);
        
        $outputHtml.="<tr><td>Distributor</td><td>$row[3]</td><td></td><td></td></tr>";

        $outputHtml.="<tr class='titleStyle1'><td colspan='4'>End user info</td></tr>";

        $outputHtml.="<tr><td>Company</td><td>$row[4]</td><td>Contact person</td><td>$row[5]</td></tr>
        <tr><td>Tel</td><td>$row[6]</td><td>Email</td><td>$row[7]</td></tr>
        <tr class='titleStyle1'><td colspan='4'>Complaint</td></tr>
        <tr><td>Delta Plus Ref</td><td>$row[8]</td><td>Qty with pb</td><td>$row[9]</td></tr>
        <tr><td>Batch No *1</td><td>$row[10]</td><td>Used days</td><td>$row[11]</td></tr>
        <tr><td>Using environment<br />
                <font class='fontStyle1'>(Please specify)</font></td>
            <td colspan='3'>$row[12]</td>
        </tr>
        <tr><td>Complaint info *2</td><td colspan='3'>$row[13]</td></tr>
        <tr><td>Upload photos *3</td><td colspan='3'>";
        //strtok()的用法：不是把分割后的字符串放进一个数组，而是每一个字符串要调用一次strtok，只是除了第一次带string参数，后续调用不能带string参数只需要一个分割符参数
        $file = strtok($row[14], ',');
        while ($file != "")    //只要文件存在
        {
            $outputHtml.= "<a target='_blank' href='upload/complain_asix/$file'>$file</a><br />";
            $file = strtok(',');  //再次调用不能带string参数
        }

        $outputHtml.="</td></tr>
                    </table>
                    <p class='fontStyle1'>
                        *1 Please see packing or on product, e.g. 1F/HS/CH52<br />
                        *2 If shoes, Please specify size and pb.<br />
                        *3 Please provide photo with product label.<br />
                    </p>
                </div>";
    }
    return $outputHtml;
}
?>