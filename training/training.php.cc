<?php

// 要求：用户名密码播放地址有效期不能下载

if(!isset($_REQUEST['video_id'])){
    exit('错误：不正确的参数');
}

session_start();

// 未登录则转到登录页
if(!isset($_SESSION['login'])){
    //$current_url = $_SERVER['REQUEST_SCHAME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php?current_url=' . $current_url);
    exit;
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
    
    <script>
    // 用于 cc 视频 传递自定义参数 -- 用于记录播放用户
    function get_custom_id()
    {
        // 用户获取待设置的自定义参数的逻辑
        var custom_id='<?= $_SESSION['login']['user_id'] ?>';
        return custom_id;
    }
    </script>

  </head>
  <body>
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    
    <!-- 注意：该段务必放入 <body> 标签中否则可能无法播放 -->
    <div class="container-fluid">
        <div class ="row">
            <script src="https://p.bokecc.com/player?vid=<?= $_REQUEST['video_id'] ?>&siteid=51C086667EC79DE3&autoStart=false&width=1280&height=720&playerid=339DB4D46697E1E8&playertype=1" type="text/javascript"></script>
        </div>
    </div>

  </body>
</html>
