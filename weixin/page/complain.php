<?php 

//表单提交处理
if (isset($_REQUEST['submitComplain']))
{
    include_once 'connectDB.php';

    //获得表自增列值用以命名上传文件
    $result=mysql_query("select AUTO_INCREMENT from information_schema.tables where table_name='complain' and table_schema='weixin'");
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
    $uploadPath="upload/complain/";
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

        //处理表单
            $buyWay=$_REQUEST['buyWay'];

            if($buyWay=="网上")
            {
                $platform=$_REQUEST['platform'];
            }
            elseif($buyWay=="线下")
            {
                $platform="";
            }

        $seller=$_REQUEST['seller'];
        $clientName=$_REQUEST['clientName'];
        $contact=$_REQUEST['contact'];
        $phone=$_REQUEST['phone'];
        $email=$_REQUEST['email'];
        $product=$_REQUEST['product'];
        $quantify=$_REQUEST['quantify'];
        $batchNumber=$_REQUEST['batchNumber'];
        $usedTimes=$_REQUEST['usedTimes'];
        $description=$_REQUEST['description'];
        $complain=$_REQUEST['complain'];

        if(!mysql_query("set autocommit=0"))
        {
            throw new Exception("MySQL错误6:".mysql_error());
        }
        if(!mysql_query("start transaction"))
        {
            throw new Exception("MySQL错误7:".mysql_error());
        }

        $sql="insert into complain(buyWay,platform,seller,clientName,contact,phone,email,product,quantify,batchNumber,usedTimes,description,complain,files,writeTime)
              values('$buyWay','$platform','$seller','$clientName','$contact','$phone','$email','$product',$quantify,'$batchNumber',$usedTimes,'$description','$complain','$fileName',now())";
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

        exit("<script>alert(\"以下位置发生错误：{$e->getMessage()}\");
                        history.back()</script>");
    }

    //数据处理成功后调用PHPMailer发邮件
    require_once "PHPMailer_v5.1/class.phpmailer.php";
    $mail=new PHPMailer();
    $mail->IsSMTP();
    $mail->Host="smtp.qiye.163.com";
    
    //$mail->Port="25";
    // 不知为何阿里云 centos + oninstack 只能用 ssl 加密方式发送邮件
    $mail->SMTPSecure = "ssl";
    $mail->Port = "994";

    $mail->SMTPAuth=true;
    $mail->Username="admin@deltaplus.com.cn";
    $mail->Password="2015deltaplus@";
    $mail->SetFrom("admin@deltaplus.com.cn","Admin");
    $mail->AddAddress("ssc@deltaplus.com.cn","");
    //$mail->AddCC("xuyi@deltaplus.com.cn","");
    $mail->CharSet="UTF-8";
    $mail->Subject="投诉报告";
    require_once ("function/generateComplain.php");
    $body=generateComplain($id);
    $mail->MsgHTML($body);

    $file = strtok($fileName, ',');
    while($file!="")    //只要文件存在
    {
        $mail->AddAttachment($uploadPath.$file);
        $file=strtok(',');  //再次调用不能带string参数
    }

    if(!$mail->Send())
    {
        exit("<script>alert(\"发送邮件失败，但投诉报告已提交，请您电话联系我司确认！\");
                        location.href='index.php?page=complain';</script>");
    }

    exit("<script>alert('感谢您的反馈，我们核实后将尽快与您联系！');
                        location.href='index.php?page=complain';</script>");

}

?>

<script src="js/validate.js"></script>
<script>

//js验证:需先导入validate.js
function validateData()
{
        var arrayData = new Array();
        var index = 0;

        //至少选择一个
        arrayData[index++] = new Array("buyWay_2","","choiceCheck","buyWay");
        //目前没有很好的电话验证方式，此处只简单地采用长度验证
        arrayData[index++] = new Array("phone", "电话", "minLength", 11);
        arrayData[index++] = new Array("email", "邮箱", "email");
        arrayData[index++] = new Array("quantify", "数量", "notNegativeInteger");
        arrayData[index++] = new Array("usedTimes", "使用时间", "notNegativeInteger");
        //js限制上传文件大小，单位为M以及最大上传数量
        arrayData[index] = new Array("files1", "上传图片", "fileCheck", 5,5);
        return validate(arrayData);
}




function initCheck()
{
    if(document.getElementById("buyWay_1").checked)
    {
        document.getElementById("platformRow").style.display="table-row";
        document.getElementById("platform").setAttribute('required','');
        document.getElementById("seller_title").innerHTML="店铺名称";
        document.getElementById("seller").setAttribute('required','');
    }
    else if(document.getElementById("buyWay_2").checked)
    {
        document.getElementById("platformRow").style.display="none";
        document.getElementById("platform").removeAttribute('required');
        document.getElementById("seller_title").innerHTML="经销商名称";
        document.getElementById("seller").setAttribute('required','');
    }
}


window.addEventListener("load",initCheck,false);

</script>

<div class="edge3">
    <p>投诉报告</p>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateData()">
        <table>
            <tr id="buyWay"><td colspan="2">您是网上购买还是线下？
                    <input id="buyWay_1" type="radio" name="buyWay" value="网上" onclick="initCheck()" />网上
                    <input id="buyWay_2" type="radio" name="buyWay" value="线下" onclick="initCheck()" />线下
                </td></tr>
            <tr><td colspan="2"><p>购买渠道</p></td></tr>
                            <tr id="platformRow"><td>网上平台</td><td><input class="width168" id="platform" name="platform" type="text" /></td></tr>
                            <tr><td id="seller_title">经销商名称</td><td><input class="width168" id="seller" name="seller" type="text" /></td></tr>
            <tr><td colspan="2"><p>投诉终端客户信息</p></td></tr>
            <tr><td>公司名称</td><td><input class="width168" name="clientName" type="text" required /></td></tr>
            <tr><td>联系人</td><td><input class="width168" name="contact" type="text" required /></td></tr>
            <tr><td>电话</td><td><input class="width168" id="phone" name="phone" type="text" required placeholder="11位数字以上固定电话含区号" /></td></tr>
            <tr><td>邮箱</td><td><input class="width168" id="email" name="email" type="email" required /></td></tr>
            <tr><td colspan="2"><p>产品质量投诉</p></td></tr>
                    <tr><td>代尔塔产品型号</td><td><input  class="width168" name="product" type="text" required /></td></tr>
                    <tr><td>出问题数量</td><td><input class="width168" id="quantify" name="quantify" type="number" required /></td></tr>
                    <tr><td>产品批号 *1</td><td><input  class="width168" name="batchNumber" type="text" required /></td></tr>
                    <tr><td>此批累计使用时间（天）</td><td><input class="width168" id="usedTimes" name="usedTimes" type="number" required /></td></tr>
                    <tr><td>使用环境及作业场所<br />
                        <font class="fontStyle1">(尽可能详尽描述)</font></td>
                        <td><textarea class="width168" name="description" required></textarea></td>
                    </tr>
                    <tr><td>具体投诉内容 *2</td><td><textarea class="width168" name="complain" required></textarea></td></tr>
            <tr><td id="file_title">上传图片 *3</td><td><input id="files1" name="files1[]" type="file" accept="image/*" multiple="true" required /></td></tr>
        </table>
        <p id="explain" class="fontStyle1">*1 产品批号请见产品包装，如：11/HS/CH52<br />*2 如为安全鞋产品，请说明尺码和具体问题部位：<br /> &nbsp; 鞋面、内衬、防砸包头、防穿刺中底、配件、脱胶、水解、舒适度等<br />*3 请尽可能提供含产品标签的照片</p>
        <input type="submit" name="submitComplain" value="提交"/>
    </form>
</div>