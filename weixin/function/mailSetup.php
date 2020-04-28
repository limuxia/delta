<?php
	// 邮件发送设置
	function mail_setup($mail)
	{
        $mail->IsSMTP();
        $mail->Host = 'smtp.qiye.163.com';
        
        //$mail->Port = '25';
		// 不知为何阿里云 centos + oninstack 只能用 ssl 加密方式发送邮件
		$mail->SMTPSecure = 'ssl';
		$mail->Port = '994';

        $mail->SMTPAuth = true;
        $mail->Username = 'notice@deltaplus.com.cn';
        $mail->Password = '7x!J)5Eo';
        $mail->SetFrom('notice@deltaplus.com.cn', 'Notice');
       }
