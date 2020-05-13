<?php

if(!isset($_SESSION['login_weixin']))
{
    if(!isset($_REQUEST['login']))
    {
        echo "<div class='edge3'>
                    <p class='alignCenter'>用户登录</p>
                    <form action='' method='post'>
                    <table class='autoCenter'>
                        <tr><td>用户名：</td><td><input style='width:160px' name='username' type='text' /></td></tr>
                        <tr><td>密码：</td><td><input style='width:160px' name='password' type='password' /></td></tr>
                        <tr><td colspan=2>
                            <input class='floatRight' name='login' type='submit' value='登录' /></td></tr>
                    </table>
                    </form>
                </div>";
        exit;
    }
    else
    {
        // 只有用户 delta 和 test 可以访问
        $username = strtolower($_REQUEST['username']);
        if($username == 'manage' && $_REQUEST['password'] == ')3dL6rM@')
        {
            $_SESSION['login_weixin'] = $username;
        }
        else
        {
            echo "<script>alert('用户名或密码错误！');history.back();</script>";
            exit;
        }
    }
}

?>
<div class="edge3 alignCenter">
    <p><a href="index.php?page=complainSearch">投诉查询</a></p>
    <p><a href="index_asix.php?page=complainSearch_asix">投诉查询（东南亚）</a></p>
    <p><a href="index.php?page=trainingSearch">培训申请查询</a></p>
    <p><a href="index.php?page=maintainSearch">产品维护和年检申请查询</a></p>
</div>