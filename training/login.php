<?php

$user_id = '';
if(isset($_REQUEST['user_id'])){
    try{
        $user_id = $_REQUEST['user_id'];

        // 注意：数据库在当前目录 -- 不存在时 sqlite 将自动创建
        $db = new SQLite3('training.db');
        $sql = 'select * from user where id="' . $user_id . '"';
        $ret = $db->query($sql);
        if(!$ret){
            throw new Exception($db->lastErrorMsg());
        }
        $row = $ret->fetchArray();

        // 如果用户不存在提示退出
        if(!$row){
            throw new Exception('用户 ' . $user_id . ' 不存在！');
        }

        // 验证用户有效期
        $valid_date = date_add(date_create($row['effective_date']), date_interval_create_from_date_string($row['valid_duration'] . ' days'));
        //if(date_diff($valid_date, date_create())->format('%a') > 0){
        // M的此函数实际使用根本不会返回负值，改用字符串直接比较
        if($valid_date > date_create()){
            // 登录成功则播放请求视频
            if($_REQUEST['user_password'] == $row['password']){
                session_start();
                $_SESSION['login'] = [
                    'user_id' => $user_id,
                    'user_description' => $row['description']
                ];
                
                $db->close();
                // 返回登录前页面，如果不存在转到培训列表页：trainingList.php
                $prev_url = isset($_REQUEST['prev_url']) ? $_REQUEST['prev_url'] : 'trainingList.php';       
                header('Location: ' . $prev_url);
                exit;
            }
            // 否则提示密码错误退出
            else{
                throw new Exception('密码错误！');
            }
        }
        // 提示失效
        else{
            throw new Exception('用户 ' . $user_id . ' 已过期！有效期：' . $row['effective_date'] . ' ~ ' . date_format($valid_date, 'Y-m-d'));
        }
    }
    catch(Exception $e){
        $db->close();

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
    <title>E-LEARNING线上培训课程</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    
    <div class="container-fluid">
        <div class ="row text-center">
            <h4>欢迎登录E-LEARNING线上培训课程</h4>
        </div>

        <div class="row">
            <div class="col-lg-offset-4 col-lg-4"><div class="row"><form class="form-horizontal">

            <div class="form-group">
                <label class="col-lg-3 control-label" for='user_id'>用户名</label>
                <div class="col-lg-9"><input class="form-control" id='user_id' name='user_id' type="text" value="<?= $user_id ?>" required /></div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for='user_password'>密码</label>
                <div class="col-lg-9"><input class="form-control" id='user_password' name='user_password' type='password' required /></div>
            </div>
                
            
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9"><button class="button" type="submit">登录</button></div>
            </div>

            </form></div></div>
        </div>

    </div>
  
</body>
</html>
