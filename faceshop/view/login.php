<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>




<?php
if(isset($_POST['logout'])){
    if(isset($_SESSION['email'])){
        session_unset();
        session_destroy();
        //echo "<script> alert('Đăng xuất thành công!!!');</script>";
    }
}
?>
</head>

<body>
<?php  require_once 'controller/AccountController.php'; $acc=new AccountController(); if(!isset($_SESSION['email'])){?>

    <div id="login">
        <div id="login_left">
            <div id="title">Đăng nhập</div>
            <form action="index.php?id=login" method="post">
                <table>
                    <tr>
                        <td id="k"><label>Email <font color="red">*</font> </label></td>
                        <td><input type="text" name="email" id="email"/></td>
                    </tr>
                    <tr>
                        <td id="k"><label>Mật khẩu <font color="red">*</font></label></td>
                        <td><input type="password" id="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td id="sub" colspan="2" align="center"><input type="submit" name="btn_submit" value="Đăng nhập"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"align="center"><a href="index.php?id=forgot_password" style="padding-right:15px; ">Quên mật khẩu</a> | <a href="index.php?id=register">Đăng ký tài khoản</a> </td>
                    </tr>
                </table>
            </form>
            <center> <?php $acc->login();?> </center>
        </div>
    </div>
<?php
}
else{
    include 'profile.php';
}?>

</body>
</html>