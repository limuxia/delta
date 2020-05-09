<?php

/**
 * mysql 升 mysqli 语法不变封装 -- 注意：去除 mysql 扩展
 * 用法：将 mysql_connect 数据库连接变量声明为全局（如在统一入口文件声明），然后 include/require 该文件
 *      global $connectDBServer;
 *      require_once('mysql.php');
 * 
 * mysqli 与 mysql 语法主要区别为有些函数必须提供数据库连接参数，如：mysqli_select_db()、mysqli_query()、mysqli_error()
 * 所以此解决方案为：采用将数据库连接声明为全局变量并封装为获取函数，在需要使用的函数中加入调用即可
 */

// 取得数据库连接全局变量
function getLink()
{
    global $connectDBServer;
    return $connectDBServer;
}

function mysql_error()
{
    return mysqli_error(getLink());
}

function mysql_close()
{
    return mysqli_close(getLink());
}

function mysql_insert_id()
{
    return mysqli_insert_id(getLink());
}

function mysql_connect($db_server,$db_user,$db_password)
{
    return mysqli_connect($db_server,$db_user,$db_password);
}

function mysql_select_db($db_name)
{
    
    return mysqli_select_db(getLink(), $db_name);
}

function mysql_query($sql)
{
    return mysqli_query(getLink(), $sql);
}

function mysql_num_rows($result)
{
    return mysqli_num_rows($result);
}

function mysql_fetch_row($result)
{
    return mysqli_fetch_row($result);
}

function mysql_fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function mysql_fetch_assoc($result)
{
    return mysqli_fetch_assoc($result);
}
