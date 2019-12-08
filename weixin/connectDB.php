<?php
$dbServer="mysql-5.7";
$db_user="user";
$db_password="user";
$db="weixin";
$connectDBServer=mysql_connect($dbServer,$db_user,$db_password);
mysql_select_db($db);
mysql_query("SET NAMES 'utf8'");	//用于utf8数据库表字段
?>