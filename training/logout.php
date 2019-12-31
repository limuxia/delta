<?php

session_start();

//登出处理
setcookie(session_name(), "", time() - 3600);
$_SESSION = null; //只用session_destroy()不会清除手动设置的$_SESSION['...']变量，所以手动清除
session_destroy();
header("location:login.php");
