<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ( $username == 'admin' && $password == '123456' ) {
        $_SESSION['login'] = 1;
        $_SESSION['success'] = 'Đăng nhập thành công';
        header('Location: /admin');
    }
    else {
        $_SESSION['errorlogin'] = 'Đăng nhập thất bại';
        header('Location: /admin/login.php');
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>TQCMS | Powerful backend admin user interface</title>
    <link href="login.css" rel="stylesheet" media="all" />

</head>
<form action="" method="post">
<body class="loginpage">

<div class="login">
    <div class="widget_header">
        <img src="images/logo.png" alt="logo" />
    </div>
    <div class="widget_contents lgNoPadding">
        <?php
        if ( isset($_SESSION['errorlogin']) ) {
        ?>
        <p class="error">Tài khoản hoặc mật khẩu không chính xác</p>
        <?php

        }
//        unset($_SESSION['errorlogin']);
        ?>
        <form action="index.html" method="post" id="wl-form" name="wl-form">
            <label for="wl-username">Username</label>
            <input type="text" id="wl-username" name="username" value="admin">
            <label for="wl-password">Password</label>
            <input type="password" id="wl-password" name="password" value="demo">
            <br />
            <input type="submit" value="Đăng nhập" id="wl-btn" name="submit" class="fright">
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="widget_footer">
        Copyright © 2012 - TQDesign
    </div>
</div>

</body>
</form>
</html>
