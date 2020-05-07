<?php

//error_reporting(E_ALL & E_STRICT);    // php5开始，增加 E_STRICT 并不包含在 E_ALL 之中，所以额外启用
error_reporting(E_ALL & ~E_DEPRECATED & E_STRICT);  //wamp2.5不或不能很好支持php5.3，因此取消此“在未来版本中可能无法正常工作的代码给出警告”

session_start();

// 验证登录 -- 限制此脚本所有操作必须登录
require_once('login_check.php');

// mysql 升级 mysqli 语法不变封装
global $connectDBServer;
require_once('../mysql.php');

// 加载数据库配置
require_once('../config/dbconnect.php');

// 更新客户 -- 未完成
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == 'customer_update'){
    $id = $_REQUEST['id'];
    $code = isset($_REQUEST['code']) ? $_REQUEST['code'] : '';
    $description = $_REQUEST['description'];
    $nature = $_REQUEST['nature'];
    $trade_id = empty($_REQUEST['trade_id']) ? 'null' : $_REQUEST['trade_id'];  // 赋值到 sql 用字符串 null
    $business = $_REQUEST['business'];

    $address = $_REQUEST['address'];    //仅发票录入使用
    $phone = $_REQUEST['phone'];    //仅发票录入使用

    require_once('function/updatecustomer.php');
    $result = updatecustomer(-2, $id, $code, $description, $nature, $trade_id, $business, $address, $phone);
    if($result != $id){ //如果执行失败返回错误信息
        echo $result;
    }
}

// json 取得客户信息 -- 未使用
if (isset($_REQUEST['ajax']) && $_REQUEST['ajax']=='customer_get')
{
    try{
        // 避免空执行
        if(empty($_REQUEST['id'])){
            throw new Exception('Warning: 拒绝空检索！');
        }
    
        $sql = "select * from customer where id={$_REQUEST['id']}";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $jsonStr=json_encode($row);
        exit($jsonStr);
    }
    catch(Exception $e){
        exit($e->getMessage());

        //exit('');
    }
}

// json 关键字检索客户列表
if (isset($_REQUEST['ajax']) && $_REQUEST['ajax']=='customer_list')
{
    try{
        // 避免空执行
        if(empty($_REQUEST['keyword'])){
            throw new Exception('Warning: 拒绝空检索！');
        }
        $sql = "select *
                from customer
                where name like \"{$_REQUEST['keyword']}%\"
                order by name";
        $result = mysql_query($sql);
        
        // 注意：指定数据行类型
        $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $jsonStr=json_encode($arr);
        exit($jsonStr);
    }
    catch(Exception $e){
        //exit($e->getMessage());

        exit('');
    }
}
