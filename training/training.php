<?php

// 要求：用户名密码播放地址有效期不能下载

session_start();

// 未登录则转到登录页
if(!isset($_SESSION['login'])){
    //$current_url = $_SERVER['REQUEST_SCHAME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php?current_url=' . $current_url);
    exit;
}

if(!isset($_REQUEST['video_id'])){
    exit('错误：不正确的参数');
}

$video_id = $_REQUEST['video_id'];
$video_url = 'video/' . $video_id .'.mp4';
require_once('writeLog.php');
$user_id = $_SESSION['login']['user_id'];
$client_ip = getip();
$client_address = get_user_addr($client_ip);
$client_device = is_mobile();
writeLog($video_id, $user_id, $client_ip, $client_address, $client_device); // 写入播放日志

?>
<div style="position: fixed; left: 0; top: 0; width: 100%; height: 100%; text-align:center">
    <video id="player" width="800" height="600" controls autoplay src="<?= $video_url ?>"></video>
</div>
