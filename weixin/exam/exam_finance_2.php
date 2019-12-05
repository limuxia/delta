<?php 

$header = "<p class='fontStyle1'>Notes:<br />
1. 本程序需要电脑上有安装压缩/解压缩软件，如没有请先安装。<br />
2. 点击开始答题后会自动下载（如果询问是否下载请选择是）一个 .zip 题目文件，解压它，然后答题，完成后重新压缩为一个文件并上传，即完成答题。<br />";

$title = '<p>COMPUTER EXAM</p>';

//表单提交处理
if (isset($_REQUEST['submit']))
{
    //处理表单
    $name = $_REQUEST['name'];
    $mobile = $_REQUEST['mobile'];
    $email_html = $header . '<p>Name: ' . $name . ' Mobile: ' . $mobile . '</p>' . $title;
    
    if(isset($_FILES['answers']) && $_FILES['answers']['error']['file1'] != UPLOAD_ERR_NO_FILE){
        // 以手机号作为文件名保存上传文件到指定路径
        $filePath = 'exam/upload/finance/' . $mobile . '.' . pathinfo($_FILES['answers']['name']['file1'], PATHINFO_EXTENSION);
        // 上传文件处理不成功时 -- 即将无法附件到邮件中提示
        if(!move_uploaded_file($_FILES['answers']['tmp_name']['file1'], $filePath)){
            $email_html .= '<p style="color: red">用户已在规定时间内完成答题，但服务器遇到错误，可让用户用其它方式发送答题文件过来。</p>';
        }
    }
    else{
        $email_html .= '<p style="color: blue">用户未上传答题文件，在规定时间内没有完成答题。</p>';
    }

    // 记录答题人，一个人只能答题一次
    write_key($mobile . 'exam_finance_2');

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

    // 测试
    // $mail->AddAddress('zirui.li@deltaplus.com.cn');

    $mail->AddAddress('wenzong.yuan@deltaplus.com.cn');
    $mail->AddCC('jennifer.zhou@deltaplus.com.cn');
    $mail->AddCC('zihong.yang@deltaplus.com.cn');
    
    $mail->CharSet="UTF-8";
    $mail->Subject="Finance computer exam";
    $mail->MsgHTML($email_html);
    
    // 如果有答题发送邮件失败时提示
    if(isset($filePath)){
        $mail->AddAttachment($filePath);

        if(!$mail->Send()){
            exit("Sorry! send email has failed, please contact us by phone to confirm!");
        }
    
        exit("Thanks for your feedback, we will contact you as soon as possible after verification!");
    }
    // 如果未答题
    else{
        $mail->Send();
        exit("您未完成答题！");
    }

}

?>

<script>
    // 验证是否可答题：key = mobile + exam 字符串组合
    function answer_check(exam)
    {
        var key = document.getElementById('mobile').value + exam;

        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                // 返回为空时表示没有答题记录，开始答题
                if(xmlhttp.responseText == ''){
                    answer_timing();
                    return;
                }
                // 不为空表示已答过题交卷不能再次答题
                else{
                    alert('您已交卷不可重复答题。');
                    return;
                }
            }
        }
        
        //加 encodeURI() 解决IE传中文乱码问题
        var url = encodeURI("exam.php?ajax=check_key&key=" + key);

        xmlhttp.open("get", url, false);	// 同步
        xmlhttp.send();	
    }

    // 答题计时：15分钟
    var timer_countDown;    // 注意该变量设置为全局，否则无法在其它函数调用里终止计时器
    function answer_timing()
    {
        if(document.getElementById('name').value != '' && document.getElementById('mobile').value != ''){
            document.getElementById('questions').className = 'show';
            document.getElementById('question_download').click();   // 触发点击下载
            timer_countDown = window.setInterval(countDown, 1000);    // 间隔1秒 -- 倒计时
        }
        else{
            alert('Plsease enter name and mobile first.');
        }
    }

    // 倒计时
    function countDown()
    {
        obj_timer_minutes = document.getElementById('timer_minutes');
        obj_timer_seconds = document.getElementById('timer_seconds');

        var timer_minutes = obj_timer_minutes.innerText;
        var timer_seconds = obj_timer_seconds.innerText;
        timer_seconds -= 1;
        if(timer_seconds < 0){
            timer_seconds = 59; // 秒复位
            timer_minutes -= 1; 
        }

        // 更新计时显示
        obj_timer_minutes.innerText = timer_minutes;
        obj_timer_seconds.innerText = timer_seconds;

        // 计时结束：交卷
        if(timer_minutes < 0){
            // window.clearInterval(timer_countDown);
            alert('When the time comes, the system will automatically submit your exam.');
            document.getElementById('submit').click();
        }
    }

</script>

<div class="edge3">
    <?= $header ?>
    <form id="exam" action="" method="post" enctype="multipart/form-data">
        <?= $title ?>
        <label>Name: </label>
        <input id="name" name="name" type="text" required />
        <label>Mobile: </label>
        <input id="mobile" name="mobile" type="text" required />

        <p style="color: red">Click button to begin answer questions. Timing: 15 minutes</p>
        <button id="timer_button_begin" type="button" onclick="answer_check('exam_finance_2')">Begin</button>
        
        <div id="questions" class="hide">
            <p style="text-align: center; font-weight: bold; color: red"><label id="timer_minutes">15</label> : <label id="timer_seconds">00</label></p>

            <p><a id="question_download" href="exam/download/finance_computer_exam.zip">下载试题</a></p>
            
            <label>上传答题文件: </label>
            <input type="file" name="answers[file1]" />

            <input id="submit" type="submit" name="submit" value="Submit" onclick="window.clearInterval(timer_countDown)" />
        </div>
    </form>
</div>