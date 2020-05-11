<?php

session_start();

// 验证登录 -- 限制必须登录才可访问
require_once('login_check.php');

// 查询处理
if(isset($_REQUEST['query'])){
    // mysql 升级 mysqli 语法不变封装
    global $connectDBServer;
    require_once('../mysql.php');

    // 加载数据库配置
    require_once('../config/dbconnect.php');

    try{        
        // 避免空执行
        if(empty($_REQUEST['customer_visit']['customer_id'])){
            throw new Exception('Error: 无效数据！');
        }

        $filter_visit_date = empty($_REQUEST['customer_visit']['visit_date']) ? '' : "and visit_date=\"{$_REQUEST['customer']['visit_date']}\"";
        $sql = "select visit_date, visit_content
                from customer_visit
                where customer_id={$_REQUEST['customer_visit']['customer_id']}
                $filter_visit_date
                order by visit_date";
        $result = mysql_query($sql);
        if(!$result){
          throw new Exception(mysql_error());
        }
        
        // 注意：指定数据行类型
        $visitList = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // 导出 csv
        if(isset($_REQUEST['export'])){
            require_once('../export_csv.php');
            $table_header = ['拜访日期', '拜访内容'];
            // 数据导出到浏览器端另存为 csv 文件
            export_csv($visitList, $table_header, 'customer_visit_'.$_REQUEST['customer']['name'].'.csv');
            exit;
        }
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

    <title>拜访日志查询</title>
  </head>
  <body>        
    <div class="container-fluid">
      
        <?php require_once('layout_header.php') ?>
        
        <div class="row"><!-- 使用 col-* 前必须有 row -->
            <div class="col-lg-offset-3 col-lg-6">
            <a class="pull-right navbar-link" href="visit_input.php">拜访日志/录入</a>
            </div>
        </div>

        <div class="row"><!-- 使用 col-* 前必须有 row -->
            <div class="col-lg-offset-3 col-lg-6">
                <h1 class="text-center">拜访日志查询</h1>

                <form class="form-inline">
                    <div style="width: 50%" class="form-group">
                        <label for="customer_name">客户名称</label>
                        <input type="hidden" id="customer-id" name="customer_visit[customer_id]" required>
                        <input style="width: 70%" type="text" class="form-control" id="customer-name" name="customer[name]" required placeholder="可录入客户名称关键字后选择）" autocomplete="off" onkeyup="filter_customer(this.value, this.parentNode)">
                    </div>
                    
                    <div class="form-group">
                        <label for="visit_date">拜访日期</label>
                        <input type="date" class="form-control" id="customer_visit-visit_date" name="customer_visit[visit_date]">
                    </div>
                    
                    <button type="submit" class="btn btn-default pull-right" name="query">查询</button>
                </form>

            </div>
        </div>
        
<?php if(isset($visitList)): ?>
        <div class ="row">            
            <div>
                <h1 class="text-center">查询结果</h1>
                <?php if(!empty($visitList)): ?>
                    <a class="pull-right navbar-link"  onclick="location.href=location.href+'&export=csv'">导出</a>
                <?php endif ?>
            </div>

            <table style="width: 90%; margin: auto" class="table-bordered">
                <tr>
                    <th>客户名称</th>
                    <th><?= $_REQUEST['customer']['name'] ?></th>
                </tr>
        
        <?php if(empty($visitList)): ?>
                <tr><td colspan="2" class="text-center">无</td></tr>
        <?php else: ?>
                <tr>
                    <th>拜访日期</th>
                    <th>拜访内容</th>
                </tr>
            <?php foreach($visitList as $visit): ?>
                <tr>
                    <td><?= $visit['visit_date'] ?></td>
                    <td><?= $visit['visit_content'] ?></td>
                </tr>    
            <?php endforeach ?>
        <?php endif ?>

            </table>
        </div>
<?php endif ?>

    </div>
  </body>
</html>
