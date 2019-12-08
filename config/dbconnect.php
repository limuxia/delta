<?php
//Connexion au serveur sql
//$serveur="124.42.122.27"; //serveur de la base de donnes
//$mdp_db="Zl6XB9iF"; //mot de passe pour la connection
$serveur="mysql-5.7";//serveur de la base de donne 数据库服务器
$db_user="user";  //login de connection 	用户名
$db_password="user"; //mot de passe pour la connection	密码
$nom_db="delta"; //nom de la base de donnes	数据库名

$connectDBServer = @mysql_connect($serveur, $db_user, $db_password) or die('Error connexion database!<br>'.$sql.'<br>'.mysql_error());
mysql_select_db($nom_db, $connectDBServer);
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET collation_connection = 'utf8_bin''utf8'");
?>
