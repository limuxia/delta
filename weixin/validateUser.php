<?php

//$url=urlencode("http://".$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//不必使用全网址，因为可能也会使用https，实测只使用请求网址部分即可
$url=urlencode($_SERVER['REQUEST_URI']);
if (!isset($_SESSION['login_weixin']))
{
    echo "<script>alert(\"请登录后操作！\");
                                location.href=\"index.php?page=manageCenter\";</script>";
    //header("location:index.php?page=login");   改为js跳转，否则会不弹消息框
    exit;
}

?>