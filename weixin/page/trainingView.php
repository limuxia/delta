<?php

	include_once 'connectDB.php';
    
	if(isset($_REQUEST['apply']) && isset($_REQUEST['trainingId']))
	{
		//验证用户如果未登录则转至登录页
		include_once 'validateUser.php';

		require_once("function/generateTraining.php");
		$body=generateTraining($_REQUEST['trainingId']);
		exit($body);
	}

	exit;

?>
