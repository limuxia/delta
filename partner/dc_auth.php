<?php

include("config/dbconnect_users.php");

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['mdp']))
{
  $login = htmlentities($_POST['login'], ENT_QUOTES); 
  $mdp = htmlentities($_POST['mdp'], ENT_QUOTES);
  
  $password_md5 = md5($mdp);
  
  // we tkae password which correspond to login visitor
  $sql = "select md5_pwd from users where login='".$login."'";
  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

  $data = mysql_fetch_assoc($req);

  if($data['md5_pwd'] != $password_md5) {
    echo '<center><p style="color:red;margin-top:150px;font-size:18px;">密码或用户名错误<br />请重新输入</p></center>';
    exit;
  }
  else {
    $_SESSION['login'] = $login;
    echo '<center><p style="color:green;margin-top:150px;font-size:18px;">您正在访问技术信息和售后服务页面</p></center>';
  }   
}
?>