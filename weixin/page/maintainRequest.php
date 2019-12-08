<?php

//表单提交处理
if (isset($_REQUEST['submit']))
{
    include_once 'connectDB.php';

    //获得表自增列值用以命名上传文件及生成邮件内容
    $result=mysql_query("select AUTO_INCREMENT from information_schema.tables where table_name='maintainrequest' and table_schema='weixin'");
    if(!$result)
    {
        exit("Mysql错误1：".mysql_error());
    }
    $row=mysql_fetch_row($result);
    $id=$row[0];




    //处理上传文件
    //移动文件至上传目录失败时报错停止工作
    //移动文件至上传目录成功返回不带路径的文件名
    //注意move_uploaded_file()如果文件已存在会被覆盖
    $fileName="";
    $files=$_FILES['files1'];
    $uploadPath="upload/maintainRequest/";
    $uploadName="";
    $i=0;

    try
    {
        //即便没有上传文件或只上传一个文件也可正常工作
        foreach($files['name'] as $file)    //不能用for ($i=0;$i<count($files);$i++)循环，因为count($files)永远是个固定长度为5的数组结构
        {
            if($files['error'][$i]==UPLOAD_ERR_OK)  //只能在此这样来判断是否有上传文件，php所谓的灵活特性变量可以是任何类型，却TMD无法用is_array($files['error'])是否是数组来判断有无上传文件，M了个巴子的总是被php、js这两种不严谨的语言折腾
            {
                $uploadName = $id . "_" . $i . "." . pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                if (move_uploaded_file($files['tmp_name'][$i], $uploadPath . $uploadName)) {
                    $fileName = $fileName . $uploadName . ",";
                } else {
                    throw new Exception("上传文件{$files['name'][$i]}失败！");
                }
            }
            $i++;
        }

        $fileName=rtrim($fileName,',');    //去掉最后一个,号





        //写入表单数据
        $maintainRequestType=$_REQUEST['maintainRequestType'];
        $company=$_REQUEST['company'];
        $contact=$_REQUEST['contact'];
        $email=$_REQUEST['email'];
        $phone=$_REQUEST['phone'];
        $productClass=$_REQUEST['productClass'];
        isset($_REQUEST['buyWay'])?$buyWay=$_REQUEST['buyWay']:$buyWay="";
        isset($_REQUEST['usedClient'])?$usedClient=$_REQUEST['usedClient']:$usedClient="";
        $batchNumber=$_REQUEST['batchNumber'];
        $product=$_REQUEST['product'];
        $quantity=$_REQUEST['quantity'];
        $buyTime=$_REQUEST['date2'];
        $usedTime=$_REQUEST['date1'];
        $usedCondition=$_REQUEST['usedCondition'];
        $requestContent=$_REQUEST['requestContent'];

        $sql="insert into maintainrequest(maintainRequestType,company,contact,email,phone,productClass,buyWay,usedClient,batchNumber,product,quantity,buyTime,usedTime,usedCondition,requestContent,files,logTime)
              values($maintainRequestType,'$company','$contact','$email','$phone',$productClass,'$buyWay','$usedClient','$batchNumber','$product',$quantity,'$buyTime','$usedTime','$usedCondition','$requestContent','$fileName',now())";

        if(!mysql_query("set autocommit=0"))
        {
            throw new Exception("MySQL错误6:".mysql_error());
        }
        if(!mysql_query("start transaction"))
        {
            throw new Exception("MySQL错误7:".mysql_error());
        }

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
        //失败后回滚数据如果上传文件则删除
        //strtok()的用法：不是把分割后的字符串放进一个数组，而是每一个字符串要调用一次strtok，只是除了第一次带string参数，后续调用不能带string参数只需要一个分割符参数
        $file = strtok($fileName, ',');
        while($file!="")    //只要文件存在
        {
            unlink($uploadPath.$file);
            $file=strtok(',');  //再次调用不能带string参数
        }

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

        exit("<script>alert(\"以下位置发生错误，您可返回重试：{$e->getMessage()}\");
                        history.back()</script>");
    }

    //数据处理成功后调用PHPMailer发邮件
    require_once "PHPMailer_v5.1/class.phpmailer.php";
    $mail=new PHPMailer();
    $mail->IsSMTP();
    $mail->Host="smtp.qiye.163.com";
    $mail->Port="25";
    $mail->SMTPAuth=true;
    $mail->Username="admin@deltaplus.com.cn";
    $mail->Password="2015deltaplus@";
    $mail->SetFrom("admin@deltaplus.com.cn","Admin");
    $mail->AddAddress("jiyun@deltaplus.com.cn","Jiyun");
    //$mail->AddCC("xuyi@deltaplus.com.cn","");
    $mail->CharSet="UTF-8";
    $mail->Subject="产品维护和年检申请";

    require_once ("function/generateMaintainRequest.php");
    $body=generateMaintainRequest($id);

    $mail->MsgHTML($body);

    $file = strtok($fileName, ',');
    while($file!="")    //只要文件存在
    {
        $mail->AddAttachment($uploadPath.$file);
        $file=strtok(',');  //再次调用不能带string参数
    }

    if(!$mail->Send())
    {
        exit("<script>alert(\"邮件发送失败，但您的产品维护和年检申请已提交，请电话联系我司确认！\");
                        location.href='index.php?page=maintainRequest';</script>");
    }

    exit("<script>alert('您的产品维护和年检申请已提交，等待我司确认！');
                        location.href='index.php?page=maintainRequest';</script>");

}

?>

<script src="js/validate.js"></script>
<script>

    //js验证:需先导入validate.js
    function validateData()
    {
        var arrayData = new Array();
        var index = 0;

        if (!("ActiveXObject" in window) || !(window.navigator.userAgent.indexOf("Chrome")>=0))   //非IE非chrome 不支持required替代验证方法
        {
            arrayData[index++] = new Array("requiredForm", "信息不全，请完整填写！", "checkRequired");
        }

        arrayData[index++] = new Array("choice_franchiser", "", "choiceCheck","maintainRequestType");
        arrayData[index++] = new Array("email", "邮箱", "email");
        arrayData[index++] = new Array("phone", "电话", "minLength",11);
        arrayData[index++] = new Array("quantity", "数量", "notNegativeInteger");
        arrayData[index++] = new Array("date2", "购买时间", "date");
        arrayData[index++] = new Array("date1", "终端开始使用时间", "date");
        arrayData[index++] = new Array("files1", "上传照片", "fileCheck",5,0);
        return validate(arrayData);
    }

    function initCheck()
    {
        if (document.getElementById('choice_franchiser').checked)
        {
            document.getElementById("change_text").innerText = "使用终端客户";
            document.getElementById("change_input").setAttribute("name","usedClient");
            document.getElementById("change_input").removeAttribute("placeholder");
        }
        else if (document.getElementById('choice_client').checked)
        {
            document.getElementById("change_text").innerText = "购买渠道";
            document.getElementById("change_input").setAttribute("name","buyWay");
            document.getElementById("change_input").setAttribute("placeholder","（经销商公司名）");
        }
    }
    window.addEventListener("load",initCheck,false);

</script>

<!-- IE不支持type=date，使用js生成日期框 -->
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
    <p>产品维护和年检申请</p>
    <form id="requiredForm" action="" method="post" enctype="multipart/form-data" name="form1" onsubmit="return validateData()">
        <table>
            <tr><td colspan="2">您是经销商还是终端使用客户？
                    <input id="choice_franchiser" type="radio" name="maintainRequestType" value="1" onclick="initCheck()" />经销商
                    <input id="choice_client" type="radio" name="maintainRequestType" value="2" onclick="initCheck()" />终端客户</td></tr>
            <tr><td>公司名</td><td><input class="width168" name="company" type="text" required /></td></tr>
            <tr><td>联系人</td><td><input class="width168" name="contact" type="text" required /></td></tr>
            <tr><td>邮箱</td><td><input id="email" class="width168" name="email" type="email" required /></td></tr>
            <tr><td>电话</td><td><input id="phone" class="width168" name="phone" type="text" required  placeholder="11位数字以上固定电话含区号" /></td></tr>
            <tr><td>可申请的产品类别（请选择）</td>
                <td><select class="width168" name="productClass" required>
                    <option></option>
                    <option value="1">呼吸器</option>
                    <option value="2">气密型防护服</option>
                    <option value="3">防坠落</option>
                </select></td>
            </tr>
            <tr><td id="change_text"></td><td><input id="change_input" class="width168" type="text" required /></td></tr>
            <tr><td>产品批号</td><td><input class="width168" name="batchNumber" type="text" required /></td></tr>
            <tr><td>产品型号</td><td><input class="width168" name="product" type="text" required placeholder="6位产品数字代码" /></td></tr>
            <tr><td>数量</td><td><input id="quantity" class="width168" name="quantity" type="number" required /></td></tr>
            <tr><td>购买时间</td><td><input id="date2" class="floatLeft width168 height21" name="date2" type="date" required />
                    <a style="float:left;margin:3px" id="dateBox2" class="hide" href="javascript:show_calendar('form1.date2');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
                        <img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="日期" />
                    </a></td>
            </tr>
            <tr><td>实际开始使用时间</td><td><input id="date1" class="floatLeft width168 height21" name="date1" type="date" required />
                    <a style="float:left;margin:3px" id="dateBox" class="hide" href="javascript:show_calendar('form1.date1');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;">
                        <img src="js/calendar.gif" style="border-top-style: none; border-right-style: none;border-left-style: none; border-bottom-style: none"  alt="日期" />
                    </a></td>
            </tr>
            <tr><td>使用状况及频率</td><td><textarea class="width168" name="usedCondition" required></textarea></td></tr>
            <tr><td>申请内容</td><td><textarea class="width168" name="requestContent" required></textarea></td></tr>
            <tr><td colspan="2">上传使用环境和产品批号照片（最多5张） <input id="files1" type="file" name="files1[]" accept="image/*" multiple="true" required/></td></tr>
        </table>
        <p class="fontStyle2">请详细的填写，以便我们及时有效的进行维护判断。稍后邮件回复是否接受维修或年检并报价。</p>
        <input type="submit" name="submit" value="提交"/>
    </form>
</div>