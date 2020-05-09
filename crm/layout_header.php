<div class="row"><!-- 使用 col-* 前必须有 row -->
    <div class="col-lg-offset-3 col-lg-6">
        <h4 class="pull-left">欢迎您！<?= strtoupper($_SESSION['login']['user_id']) . ' ' . $_SESSION['login']['user_name'] ?></h4>
        <a class="pull-right navbar-link" href="logout.php">退出</a>
    </div>
</div>