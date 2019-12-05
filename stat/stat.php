<?php

include("config/dbconnect_users.php");

if(!isset($_SESSION['login']))
{
  echo '<center><br /><br /><br /><br /><br /><h1>登录后可查看此类信息</h1></center>';
  exit;
}

else
{
	if(!isset($_SESSION['time']))
	{
		// il s'agit d'un nouveau visiteur, on crée $_SESSION['parcours'] et $_SESSION['time']
		$_SESSION['time'] = time();
			
		$time=$_SESSION['time'];
		$login=$_SESSION['login'] ;
		
		// on crée un enregistrement dans la table
		$sql = "INSERT INTO statistic (name,time,sessid)";
		$sql .= "VALUES ('$login','$time','".session_id()."')";
	}
	else
	{
		$_SESSION['time'].= ';'.time();
		$time=$_SESSION['time'];
		$sql = "UPDATE statistic SET time='$time'";
		$sql .= "WHERE sessid='".session_id()."'";
	}
}

//Enfin on exécute la requête dans tous les cas
mysql_query($sql) or die('Erreur SQL !
'.$sql.'
'.mysql_error());


?>
