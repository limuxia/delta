<?php

// 未登录则转到登录页
if(!isset($_SESSION['login'])){
    //$current_url = $_SERVER['REQUEST_SCHAME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php?current_url=' . $current_url);
    exit;
}

?>