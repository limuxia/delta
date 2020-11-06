<?php

// 写入播放记录
function writeLog($video_id, $user_id, $client_ip, $client_address, $client_device)
{
    // 注意：数据库在当前目录 -- 不存在时 sqlite 将自动创建
    $db = new SQLite3('training.db');
    $sql = "insert into training_log(
        log_time,
        video_id,
        user_id,
        client_ip,
        client_address,
        client_device)
        values(datetime('now'), $video_id, '$user_id', '$client_ip', '$client_address', '$client_device')";
    $ret = $db->exec($sql);
    if(!$ret){
        throw new Exception($db->lastErrorMsg());
    }
}

//获取用户ip
function getip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return $ip;
 }

 //根据ip获取城市、
function get_user_addr($ip){
    $ak= '百度申请的ak';
    $url = "http://api.map.baidu.com/location/ip?ak=$ak&ip=$ip";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    if(curl_errno($ch)) {
        echo 'CURL ERROR Code: '.curl_errno($ch).', reason: '.curl_error($ch);
    }
    curl_close($ch);
    $info = json_decode($output, true);
    $addr_info = 'Can not location ip';
    if($info['status'] == "0"){
        $addr_info = $info['content']['address_detail']['province'].$info['content']['address_detail']['city'];
    }
 
    return $addr_info;
 }

 //获取用户浏览器类型
 function is_mobile(){  
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (stripos($user_agent, "iPhone")!==false) {
        $brand = 'iPhone';
    } else if (stripos($user_agent, "SAMSUNG")!==false || stripos($user_agent, "Galaxy")!==false || strpos($user_agent, "GT-")!==false || strpos($user_agent, "SCH-")!==false || strpos($user_agent, "SM-")!==false) {
        $brand = '三星';
    } else if (stripos($user_agent, "Huawei")!==false || stripos($user_agent, "Honor")!==false || stripos($user_agent, "H60-")!==false || stripos($user_agent, "H30-")!==false) {
        $brand = '华为';
    } else if (stripos($user_agent, "Lenovo")!==false) {
        $brand = '联想';
    } else if (strpos($user_agent, "MI-ONE")!==false || strpos($user_agent, "MI 1S")!==false || strpos($user_agent, "MI 2")!==false || strpos($user_agent, "MI 3")!==false || strpos($user_agent, "MI 4")!==false || strpos($user_agent, "MI-4")!==false) {
        $brand = '小米';
    } else if (strpos($user_agent, "HM NOTE")!==false || strpos($user_agent, "HM201")!==false) {
        $brand = '红米';
    } else if (stripos($user_agent, "Coolpad")!==false || strpos($user_agent, "8190Q")!==false || strpos($user_agent, "5910")!==false) {
        $brand = '酷派';
    } else if (stripos($user_agent, "ZTE")!==false || stripos($user_agent, "X9180")!==false || stripos($user_agent, "N9180")!==false || stripos($user_agent, "U9180")!==false) {
        $brand = '中兴';
    } else if (stripos($user_agent, "OPPO")!==false || strpos($user_agent, "X9007")!==false || strpos($user_agent, "X907")!==false || strpos($user_agent, "X909")!==false || strpos($user_agent, "R831S")!==false || strpos($user_agent, "R827T")!==false || strpos($user_agent, "R821T")!==false || strpos($user_agent, "R811")!==false || strpos($user_agent, "R2017")!==false) {
        $brand = 'OPPO';
    } else if (strpos($user_agent, "HTC")!==false || stripos($user_agent, "Desire")!==false) {
        $brand = 'HTC';
    } else if (stripos($user_agent, "vivo")!==false) {
        $brand = 'vivo';
    } else if (stripos($user_agent, "K-Touch")!==false) {
        $brand = '天语';
    } else if (stripos($user_agent, "Nubia")!==false || stripos($user_agent, "NX50")!==false || stripos($user_agent, "NX40")!==false) {
        $brand = '努比亚';
    } else if (strpos($user_agent, "M045")!==false || strpos($user_agent, "M032")!==false || strpos($user_agent, "M355")!==false) {
        $brand = '魅族';
    } else if (stripos($user_agent, "DOOV")!==false) {
        $brand = '朵唯';
    } else if (stripos($user_agent, "GFIVE")!==false) {
        $brand = '基伍';
    } else if (stripos($user_agent, "Gionee")!==false || strpos($user_agent, "GN")!==false) {
        $brand = '金立';
    } else if (stripos($user_agent, "HS-U")!==false || stripos($user_agent, "HS-E")!==false) {
        $brand = '海信';
    } else if (stripos($user_agent, "Nokia")!==false) {
        $brand = '诺基亚';
    }
 if( (false == strpos($user_agent,'MSIE')) && (strpos($user_agent, 'Trident')!==FALSE) ){
  $brand = 'Internet Explorer 11.0';
 }
 if(false!==strpos($user_agent,'MSIE 10.0')){
  $brand = 'Internet Explorer 10.0';
 }
 if(false!==strpos($user_agent,'MSIE 9.0')){
  $brand = 'Internet Explorer 9.0';
 }
 if(false!==strpos($user_agent,'MSIE 8.0')){
  $brand = 'Internet Explorer 8.0';
 }
 if(false!==strpos($user_agent,'MSIE 7.0')){
  $brand = 'Internet Explorer 7.0';
 }
 if(false!==strpos($user_agent,'MSIE 6.0')){
  $brand = 'Internet Explorer 6.0';
 }
 if(false!==strpos($user_agent,'Edge')){
  $brand =  '微软';
 }
 if(false!==strpos($user_agent,'Firefox')){
  $brand =  '火狐';
 }
 if(false!==strpos($user_agent,'Chrome')){
  $brand =  '谷歌';
 }
 if(false!==strpos($user_agent,'Safari') && false ===strpos($user_agent,'Chrome')){
  $brand =  '苹果';
 }
 if(false!==strpos($user_agent,'Opera')){
  $brand =  '欧朋';
 }
 if(false!==strpos($user_agent,'360SE')){
  $brand =  '360';
 }
  //微信浏览器
 if(false!==strpos($user_agent,'MicroMessage')){
  $brand =  'QQ';
 }
 return $brand;
 }
