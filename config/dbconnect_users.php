<?php
//Connexion au serveur sql
$serveur="127.0.0.1"; //serveur de la base de donne 数据库服务器
$login_db="user";  //login de connection	用户名
$mdp_db="user"; //mot de passe pour la connection	密码
$nom_db="delta"; //nom de la base de donnes	数据库名

$db = @mysql_connect($serveur, $login_db, $mdp_db) or die('Error connexion database!<br>'.$sql.'<br>'.mysql_error());
mysql_select_db($nom_db, $db);
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET collation_connection = 'utf8_bin''utf8'");
?>