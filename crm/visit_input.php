<?php

session_start();

// 验证登录 -- 限制必须登录才可访问
require_once('login_check.php');

// 提交处理
if(isset($_REQUEST['save'])){  
  try{
    // mysql 升级 mysqli 语法不变封装
    global $connectDBServer;
    require_once('../mysql.php');

    // 加载数据库配置
    require_once('../config/dbconnect.php');

    $customer_visit = $_REQUEST['customer_visit'];

    $result = true; // 默认为真表示执行正常
    // 新增客户
    if(empty($customer_visit['customer_id'])){
      $customer = $_REQUEST['customer'];
      $sql = "insert into customer(name, area, customer_nature_id, group_company)
              values(\"{$customer['name']}\", \"{$customer['area']}\", {$customer['customer_nature_id']}, \"{$customer['group_company']}\")";
      $result = mysql_query($sql);
      if(!$result){
        throw new Exception(mysql_error());
      }

      $customer_visit['customer_id'] = mysql_insert_id();
    }

    // 写入拜访日志
    $sql2 = "insert into customer_visit(customer_id, visit_date, visit_content)
            values({$customer_visit['customer_id']}, \"{$customer_visit['visit_date']}\", \"{$customer_visit['visit_content']}\")";
    $result2 = mysql_query($sql2);

    // 成功后提示并转到录入页
    if(!$result2){
      throw new Exception(mysql_error());
    }
    
    exit("<script>
            alert('已保存！');
            location.href = 'visit_input.php';
    </script>"); 
  }
  catch(Exception $e){
    exit('<script>
        alert("' . $e->getMessage() . '");
        history.back();
      </script>');
  }

}

?>

<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

    <script src="js/ajax_customer.js"></script>

    <title>录入拜访日志</title>
  </head>
  <body>
    <div class="container-fluid">
      
      <?php require_once('layout_header.php') ?>
      
      <div class="row"><!-- 使用 col-* 前必须有 row -->
        <div class="col-lg-offset-3 col-lg-6">
          <a class="pull-right navbar-link" href="visit_query.php">拜访日志/查询</a>
        </div>
      </div>

      <div class="row"><!-- 使用 col-* 前必须有 row -->
        <div class="col-lg-offset-3 col-lg-6">
          <h1 class="text-center">录入拜访日志</h1>

          <form>
            <div class="form-group">
              <label for="area">区域代码</label>
              <input type="text" class="form-control" id="customer-area" name="customer[area]" onchange="update_customer($('#customer-id').val(), 'area', this.value)">
            </div>
            <div class="form-group">
              <label for="customer_name">客户名称</label>
              <input type="hidden" id="customer-id" name="customer_visit[customer_id]">
              <input type="text" class="form-control" id="customer-name" name="customer[name]" required placeholder="全称，不能简写（可录入名称自动匹配选择）" autocomplete="off" onkeyup="filter_customer(this.value, this.parentNode)"><!-- 选择自动填充后不可更改防止死循环 onchange -->
            </div>
            <div class="form-group">
              <label for="area">客户性质</label>
              <div class="radio"><label><input type="radio" name="customer[customer_nature_id]" value="1" required onclick="update_customer($('#customer-id').val(), 'customer_nature_id', this.value)">签约经销商</label></div>
              <div class="radio"><label><input type="radio" name="customer[customer_nature_id]" value="2" required onclick="update_customer($('#customer-id').val(), 'customer_nature_id', this.value)">二级经销商</label></div>
              <div class="radio"><label><input type="radio" name="customer[customer_nature_id]" value="3" required onclick="update_customer($('#customer-id').val(), 'customer_nature_id', this.value)">终端</label></div>
            </div>
            <div class="form-group">
              <label for="group_company">所属集团</label>
              <input type="text" class="form-control" id="customer-group_company" name="customer[group_company]" onchange="update_customer($('#customer-id').val(), 'group_company', this.value)">
            </div>
            <div class="form-group">
              <label for="visit_date">拜访日期</label>
              <input type="date" class="form-control" id="customer_visit-visit_date" name="customer_visit[visit_date]" required>
            </div>
            <div class="form-group">
              <label for="visit_content">拜访内容</label>
              <textarea class="form-control" id="customer_visit-visit_content" name="customer_visit[visit_content]" required></textarea>
            </div>
            <button type="submit" class="btn btn-default" name="save">保存</button>
          </form>

        </div>
      </div>

    </div>
  </body>
</html>
