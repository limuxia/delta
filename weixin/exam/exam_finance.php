<?php 

$header = "<p class='fontStyle1'>Notes:<br />
1.	You are supposed not to be able to finish all the questions within 15 minutes. However, you are encouraged to answer as many questions as you can.<br />
2.	Please write down your answers clearly and make full explanation if you have.<br />
3.	Please complete by yourself, any smart device is forbidden in your examination.<br />
4.	If you have question about the test, do ask for help.<br />
5.	Answer in English or Chinese is acceptable.<br /></p>";

$title = '<p>QUESTIONS</p>';

$questions[1] = "<p>1.	Company A’s beginning and ending inventories for the month of Feb. are:<br />
<br />
<table border='1' cellspacing='0' cellpadding='4'>
<tr><td></td><td>February 1</td><td>February 28</td></tr>
<tr><td>Direct materials</td><td>67,000</td><td>62,000</td></tr>
<tr><td>Work-in-process</td><td>145,000</td><td>171,000</td></tr>
<tr><td>Finished goods</td><td>85,000</td><td>78,000</td></tr>
</table>
<br />
Production data for the month of Feb. as follows:<br />
<table border='1' cellspacing='0' cellpadding='4'>
<tr><td>Director labor</td><td>200,000</td></tr>
<tr><td>Actual overhead</td><td>132,000</td></tr>
<tr><td>Director materials purchased</td><td>163,000</td></tr>
<tr><td>Transportation in</td><td>4,000</td></tr>
<tr><td>Purchas returns and allowances</td><td>2,000</td></tr>
</table>
<br />
Company A uses one overhead control account and charges overhead production at 70% of direct labor cost. The company does not formally recognize over/underapplied overhead until year-end.<br />
<br />
Required:<br />
Pls. try to calculate<br />
a.	Company A’s total manufacturing cost<br />
b.	Company A’s cost of goods transferred to FG inventory for Feb.<br />
c.	Company A’s cost of goods sold for Feb.<br /></p>";

$questions[2] = "<p>2.	What is standard cost? Pls. try to descript the generally procedure for setting up a standard cost system in brief.</p>";

//表单提交处理
if (isset($_REQUEST['submit']))
{
    //处理表单
    $name = $_REQUEST['name'];
    $mobile = $_REQUEST['mobile'];
    $answers = $_REQUEST['answers'];
    $email_html = $header . '<p>Name: ' . $name . ' Mobile: ' . $mobile . '</p>' . $title . $questions[1] . '<p style="color: blue">Answer: ' . $answers[1] . '</p>' . $questions[2] . '<p style="color: blue">Answer: ' . $answers[2] . '</p>';

    // 记录答题人，一个人只能答题一次
    write_key($mobile . 'exam_finance');

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
    $mail->Subject="Finance exam";
    $mail->MsgHTML($email_html);
    
    // 如果未答题
    if(empty($answers[1]) && empty($answers[2])){
        exit("您未完成答题！");
    }
    // 如果有答题发送邮件失败时提示
    else{
        if(!$mail->Send())
        {
            exit("Sorry! send email has failed, but the report has been submitted. You can contact us by phone to confirm!");
        }

        exit("Thanks for your feedback, we will contact you as soon as possible after verification!");    
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
            timer_countDown = window.setInterval(countDown, 1000);    // 间隔1秒 -- 倒计时
        }
        else{
            alert('Please enter name and mobile first.');
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
    <form id="exam" action="" method="post">
        <?= $title ?>
        <label>Name: </label>
        <input id="name" name="name" type="text" required />
        <label>Mobile: </label>
        <input id="mobile" name="mobile" type="text" required />

        <p style="color: red">Click button to begin answer questions. Timing: 15 minutes</p>
        <button id="timer_button_begin" type="button" onclick="answer_check('exam_finance')">Begin</button>
        
        <div id="questions" class="hide">
            <p style="text-align: center; font-weight: bold; color: red"><label id="timer_minutes">15</label> : <label id="timer_seconds">00</label></p>

            <?= $questions[1] ?>
            <textarea style="width: 100%; min-height: 100px" name="answers[1]"></textarea>
            
            <?= $questions[2] ?>
            <textarea style="width: 100%; min-height: 100px" name="answers[2]"></textarea>

            <input id="submit" type="submit" name="submit" value="Submit" onclick="window.clearInterval(timer_countDown)" />
        </div>
    </form>
</div>