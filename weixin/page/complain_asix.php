<?php 

//表单提交处理
if (isset($_REQUEST['submitComplain']))
{
    include_once 'connectDB.php';

    //获得表自增列值用以命名上传文件
    $result=mysql_query("select AUTO_INCREMENT from information_schema.tables where table_name='complain_asix' and table_schema='weixin'");
    if(!$result)
    {
        exit("An error occurred: ".mysql_error());
    }

    $row=mysql_fetch_row($result);
    $id=$row[0];

    //处理上传文件
    //移动文件至上传目录失败时报错停止工作
    //移动文件至上传目录成功返回不带路径的文件名
    //注意move_uploaded_file()如果文件已存在会被覆盖
    $fileName="";
    $files=$_FILES['files1'];
    $uploadPath="upload/complain_asix/";
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
                    throw new Exception("Upload {$files['name'][$i]} failed!");
                }
            }
            $i++;
        }

        $fileName=rtrim($fileName,',');    //去掉最后一个,号

        //处理表单
        $buyWay=$_REQUEST['buyWay'];
        /* if($buyWay=="网上")
        {
            $platform=$_REQUEST['platform'];
        }
        elseif($buyWay=="线下")
        {
            $platform="";
        } */
        $platform = '';

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
            throw new Exception("An error occurred: ".mysql_error());
        }
        if(!mysql_query("start transaction"))
        {
            throw new Exception("An error occurred: ".mysql_error());
        }

        $sql="insert into complain_asix(buyWay,platform,seller,clientName,contact,phone,email,product,quantify,batchNumber,usedTimes,description,complain,files,writeTime)
              values('$buyWay','$platform','$seller','$clientName','$contact','$phone','$email','$product',$quantify,'$batchNumber',$usedTimes,'$description','$complain','$fileName',now())";
        $result=mysql_query($sql);
        if(!$result)
        {
            throw new Exception("An error occurred: ".mysql_error());
        }

        //还原事务自动提交，MySQL该命令会自动提交未commit的事务
        if(!mysql_query("set autocommit=1"))
        {
            if(!mysql_query("commit"))
            {
                throw new Exception("An error occurred: ".mysql_error());
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
            exit("<script>
                    alert('An error occurred: ' . mysql_error());
                    history.back();
                </script>");
        }

        exit("<script>
                alert(\"An error occurred: {$e->getMessage()}\");
                history.back();
            </script>");
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

    //测试
    //$mail->AddAddress('zirui.li@deltaplus.com.cn', '');

    $mail->AddAddress("tang@deltaplus.com.cn","Tangxingmei");
    $mail->AddAddress("dpasia@deltaplus.com.cn","");
    $mail->AddCC("xuyi@deltaplus.com.cn","");
    
    $mail->CharSet="UTF-8";
    $mail->Subject="Quality complaint";
    require_once ("function/generateComplain_asix.php");
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
        exit("<script>alert(\"Send email has failed, but the complaint report has been submitted. You can contact us by phone to confirm!\");
                        location.href='index_asix.php?page=complain_asix';</script>");
    }

    exit("<script>alert('Thanks for your feedback, we will contact you as soon as possible after verification!');
                        location.href='index_asix.php?page=complain_asix';</script>");

}

?>

<script src="js/validate_en.js"></script>
<script>

//js验证:需先导入validate.js
function validateData()
{
        var arrayData = new Array();
        var index = 0;

        //至少选择一个
        arrayData[index++] = new Array("buyWay_2","","choiceCheck","buyWay");
        //目前没有很好的电话验证方式，此处只简单地采用长度验证
        //arrayData[index++] = new Array("phone", "电话", "minLength", 11);
        arrayData[index++] = new Array("email", "Email", "email");
        arrayData[index++] = new Array("quantify", "Qty with pb", "notNegativeInteger");
        arrayData[index++] = new Array("usedTimes", "Used days", "notNegativeInteger");
        //js限制上传文件大小，单位为M以及最大上传数量
        arrayData[index] = new Array("files1", "Upload photos", "fileCheck", 5,5);
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
    <p>Quality complaint</p>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateData()">
        <table>
                <input id="buyWay_1" type="hidden" name="buyWay" value="" />
                <input class="width168" id="platform" name="platform" type="hidden" value="" />
            <tr><td id="seller_title">Distributor</td><td><input class="width168" id="seller" name="seller" type="text" required /></td></tr>
            <tr><td colspan="2"><p>End user info</p></td></tr>
            <tr><td>Company</td><td><input class="width168" name="clientName" type="text" required /></td></tr>
            <tr><td>Contact person</td><td><input class="width168" name="contact" type="text" required /></td></tr>
            <tr><td>Tel</td><td><input class="width168" id="phone" name="phone" type="text" required placeholder="" /></td></tr>
            <tr><td>Email</td><td><input class="width168" id="email" name="email" type="email" required /></td></tr>
            <tr><td colspan="2"><p>Complaint</p></td></tr>
                    <tr><td>Delta Plus Ref</td><td><input  class="width168" name="product" type="text" required /></td></tr>
                    <tr><td>Qty with pb</td><td><input class="width168" id="quantify" name="quantify" type="number" required /></td></tr>
                    <tr><td>Batch No *1 </td><td><input  class="width168" name="batchNumber" type="text" required /></td></tr>
                    <tr><td>Used days</td><td><input class="width168" id="usedTimes" name="usedTimes" type="number" required /></td></tr>
                    <tr><td>Using environment<br />
                        <font class="fontStyle1">(Please specify)</font></td>
                        <td><textarea class="width168" name="description" required></textarea></td>
                    </tr>
                    <tr><td>Complaint info *2 </td><td><textarea class="width168" name="complain" required></textarea></td></tr>
            <tr><td id="file_title">Upload photos *3 </td><td><input id="files1" name="files1[]" type="file" accept="image/*" multiple="true" required /></td></tr>
        </table>
        <p id="explain" class="fontStyle1">
            *1 Please see packing or on product, e.g. 1F/HS/CH52<br />
            *2 If shoes, Please specify size and pb.<br />
            *3 Please provide photo with product label.
        </p>
        <input type="submit" name="submitComplain" value="Submit"/>
    </form>
</div>