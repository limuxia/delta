<?php
$dbServer="127.0.0.1";
$dbUser="weixin";
$dbPassword="weixin";
$db="weixin";
$con=mysql_connect($dbServer,$dbUser,$dbPassword);
mysql_select_db($db);
mysql_query("SET NAMES 'utf8'");	//用于utf8数据库表字段
?>