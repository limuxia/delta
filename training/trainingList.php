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

try{
    // 注意：数据库在当前目录 -- 不存在时 sqlite 将自动创建
    $db = new SQLite3('training.db');
    $sql = 'select * from training_list where status=0';
    $ret = $db->query($sql);
    if(!$ret){
        throw new Exception($db->lastErrorMsg());
    }
    $traingList = [];   // 避免无查询结果时不赋值报错
    while($row = $ret->fetchArray()){
        $traingList[] = $row;
    }
}
catch(Exception $e){
    $db->close();

    exit('<script>
    alert("' . $e->getMessage() . '");
    history.back();
</script>');
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
        <div class ="row">
            <h4 class="col-lg-offset-2">欢迎您！<?= $_SESSION['login']['user_id'] . ' ' . $_SESSION['login']['user_description'] ?></h4>
            <div class="col-lg-offset-10"><a class="navbar-link" href="logout.php">退出</a></div>
        </div>

        <div class ="row text-center">
            <div class="col-lg-offset-5 col-lg-2 list-group">
            
            <?php foreach($traingList as $training): ?>
                <a class="list-group-item" href="training.php?video_id=<?= $training['video_id'] ?>"><?= $training['description'] ?></a>
            <?php endforeach ?>
            
            </div>            
        </div>

    </div>

  </body>
</html>
