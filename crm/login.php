<?php

// 用于记住用户名
$user_id = '';

// 验证登录
if(isset($_REQUEST['login'])){
    $user_id = $_REQUEST['user_id'];
    try{
        if(strtoupper($user_id) == 'CRM' && $_REQUEST['user_password'] == '1E&n8%'){
            session_start();
            $_SESSION['login'] = [
                'user_id' => $user_id
            ];
            
            // 返回登录前页面，如果不存在转到录入页面
            $prev_url = isset($_REQUEST['prev_url']) ? $_REQUEST['prev_url'] : 'visit_input.php';       
            header('Location: ' . $prev_url);
            exit;
        }
        // 否则提示用户名或密码错误退出
        else{
            throw new Exception('用户名或密码错误！');
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

    <title>登录</title>
  </head>
  <body>    
    <div class="container-fluid">
        <div class ="row text-center"><h4>请登录</h4></div>

        <div class="row"><!-- 使用 col-* 前必须有 row -->
            <div class="col-lg-offset-4 col-lg-4"><div class="row"><form class="form-horizontal">

            <div class="form-group">
                <label class="col-lg-3 control-label" for='user_id'>用户名</label>
                <div class="col-lg-9"><input class="form-control" id='user_id' name='user_id' type="text" value="<?= $user_id ?>" required></div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-3 control-label" for='user_password'>密码</label>
                <div class="col-lg-9"><input class="form-control" id='user_password' name='user_password' type='password' required></div>
            </div>
                
            
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9"><button class="button" type="submit" name="login">登录</button></div>
            </div>

            </form></div></div>
        </div>

    </div>
  
</body>
</html>
