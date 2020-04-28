<?php 

//表单提交处理
if (isset($_REQUEST['submitTrianing']))
{
    include_once 'connectDB.php';

    //获得表自增列值用以完成后调用生成网页发邮件
    $result=mysql_query("select AUTO_INCREMENT from information_schema.tables where table_name='training' and table_schema='weixin'");
    if(!$result)
    {
        exit("Mysql错误1：".mysql_error());
    }

    $row=mysql_fetch_row($result);
    $id=$row[0];

    //处理表单
    $trainingWay=$_REQUEST['trainingWay'];
    $address=$_REQUEST['address'];
    $times=$_REQUEST['times'];
    $hopeDate=$_REQUEST['hopeDate'];

    $contentArray=$_REQUEST['content'];
    $content="";
    if(is_array($contentArray))
    {
        foreach($contentArray as $i)
        {
            $content.=$i.',';
        }
        $content=rtrim($content,',');
    }
    else
    {
        $content=$contentArray;
    }

    $demand=$_REQUEST['demand'];
    $company=$_REQUEST['company'];
    $contact=$_REQUEST['contact'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $areYou=$_REQUEST['areYou'];

    try
    {

        if(!mysql_query("set autocommit=0"))
        {
            throw new Exception("MySQL错误6:".mysql_error());
        }
        if(!mysql_query("start transaction"))
        {
            throw new Exception("MySQL错误7:".mysql_error());
        }

        $sql="insert into training(trainingWay,address,times,hopeDate,content,demand,company,contact,email,phone,areYou,logTime)
              values('$trainingWay','$address','$times','$hopeDate','$content','$demand','$company','$contact','$email','$phone','$areYou',now())";

        $result=mysql_query($sql);
        if(!$result)
        {
            throw new Exception("MySQL错误8:".mysql_error());
        }

        //还原事务自动提交，MySQL该命令会自动提交未commit的事务
        if(!mysql_query("set autocommit=1"))
        {
            if(!mysql_query("commit"))
            {
                throw new Exception("MySQL错误10:".mysql_error());
            }
        }
    }
    catch (Exception $e)
    {
        //失败后回滚数据
        //如果回滚失败，MySQL不要set autocommit=1会导致转而提交事务
        if(mysql_query("rollback"))
        {
            //还原事务自动提交，如果失败并不要紧
            mysql_query("set autocommit=1");
        }
        else
        {
            exit("MySQL错误，请联系管理员:".mysql_error());
        }

        exit("<script>alert(\"以下位置发生错误：{$e->getMessage()}\");
                        history.back()</script>");
    }

    //数据处理成功后调用PHPMailer发邮件
    require_once('PHPMailer_v5.1/class.phpmailer.php');
    require_once('function/mailSetup.php');
    $mail = new PHPMailer();
    mail_setup($mail);

    $mail->AddAddress("yuyanyan@deltaplus.com.cn","Yuyanyan");
    //$mail->AddCC("xuyi@deltaplus.com.cn","");
    $mail->CharSet="UTF-8";
    $mail->Subject="培训申请";
    require_once ("function/generateTraining.php");
    $body=generateTraining($id);
    $mail->MsgHTML($body);
    if(!$mail->Send())
    {
        //exit($mail->ErrorInfo);
        exit("<script>alert(\"发送邮件失败，但您的培训申请已提交，请您电话联系我司确认！\");
                        location.href='index.php?page=training';</script>");
    }

    exit("<script>alert('培训申请已提交，我们会尽快和您联系。');
                        location.href='index.php?page=training';</script>");

}

?>

<script src="js/validate.js"></script>
<script>

//js验证:需先导入validate.js
function validateData()
{
    var arrayData = new Array();
    var index = 0;

    arrayData[index++] = new Array("trainingWay_1","培训方式","choiceCheck","trainingWay");
    arrayData[index++] = new Array("content_1","希望了解的产品线（多选框）","choiceCheck","content[]");
    //目前没有很好的电话验证方式，此处只简单地采用长度验证
    arrayData[index++] = new Array("email", "邮箱", "email");
    arrayData[index++] = new Array("phone", "电话", "minLength", 11);
    arrayData[index] = new Array("areYou_1","终端客户/经销商","choiceCheck","areYou");

    return validate(arrayData);
}

function changeTimes(selectValue)
{
    if(selectValue=="其它")
    {
        document.getElementById("times").value="";
        document.getElementById("times").setAttribute('type','text');
    }
    else
    {
        document.getElementById("times").value=selectValue;
        document.getElementById("times").setAttribute('type','hidden');
    }
}

function initCheck()
{
    if (document.getElementById('trainingWay_1').checked)
    {
        document.getElementById("address").value="江苏省苏州市吴江区平望镇中鲈园欧盛大道2号";
        document.getElementById("address").setAttribute('readonly','');
        document.getElementById("address").style.color='gray';
    }
    else if (document.getElementById('trainingWay_2').checked)
    {
        document.getElementById("address").value="";
        document.getElementById("address").removeAttribute('readonly');
        document.getElementById("address").style.color='black';
        document.getElementById("address").setAttribute('placeholder','请填写您希望的培训地址！');
    }
}

//window.addEventListener("load",initCheck,false);

</script>
<div class="edge3">
    <p>培训申请</p>
    <form action="" method="post" onsubmit="return validateData()">
        <table>
            <tr><td colspan="2">
                    <input id="trainingWay_1" type="radio" name="trainingWay" value="来代尔塔公司培训" onclick="initCheck()" />来代尔塔公司培训
                    <input id="trainingWay_2" type="radio" name="trainingWay" value="去贵司现场培训" onclick="initCheck()" />去贵司现场培训</td></tr>
            <tr><td>培训地址</td><td><textarea class="width168" id="address" name="address" required></textarea></td></tr>
            <tr><td>时长</td><td><select class="width168" onchange="changeTimes(this.options[selectedIndex].text)">
                        <option>半天</option>
                        <option>一天</option>
                        <option>两天</option>
                        <option>其它</option>
                    </select>
                    <input id="times" type="hidden" name="times" value="半天" required />
                </td>
            </tr>
            <tr><td>希望日期</td><td><input class="width168 height21" type="date" name="hopeDate" required /></td></tr>
            <tr><td colspan="2">希望了解的产品线（多选框）
                    <input id="content_1" type="checkbox" name="content[]" value="头面听" />头面听
                    <input type="checkbox" name="content[]" value="呼吸" />呼吸
                    <input type="checkbox" name="content[]" value="手部" />手部
                    <input type="checkbox" name="content[]" value="足部" />足部
                    <input type="checkbox" name="content[]" value="防护服" />防护服
                    <input type="checkbox" name="content[]" value="防坠落" />防坠落
                    <input type="checkbox" name="content[]" value="生命线" />生命线
                    <input type="checkbox" name="content[]" value="救援" />救援
            </td></tr>
            <tr><td>培训要求</td><td><textarea class="width168" name="demand" required></textarea></td></tr>
            <tr><td>您的公司名</td><td><input class="width168" type="text" name="company" required /></td></tr>
            <tr><td>联系人</td><td><input class="width168" type="text" name="contact" required /></td></tr>
            <tr><td>邮箱</td><td><input class="width168" id="email" type="email" name="email" required /></td></tr>
            <tr><td>电话</td><td><input class="width168" id="phone" type="text" name="phone" placeholder="11位数字以上固定电话含区号" required /></td></tr>
            <tr><td colspan="2">您是？
                    <input id="areYou_1" type="radio" name="areYou" value="终端客户" />终端客户
                    <input type="radio" name="areYou" value="经销商" />经销商
            </td></tr>
        </table>
        <input type="submit" name="submitTrianing" value="提交"/>
    </form>
</div>