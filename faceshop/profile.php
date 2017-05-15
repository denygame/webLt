<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
   <link rel="stylesheet" href="css/profile.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div id="profile">
    <div id="profile_left">
        <a id="info_login" href="index.php?id=login&idlogin=info_login">
            <div id="icon"><img src="img/logo/account.png" alt=""/></div>
            <div id="feature">
                <b>Thông tin đăng nhập</b>
                <p>Quản lý thông tin đăng nhập</p>
            </div>
        </a>
        <a id="info_user" href="index.php?id=login&idlogin=info_user">
            <div id="icon"><img src="img/logo/info.jpg" alt=""/></div>
            <div id="feature">
                <b>Thông tin chung</b>
                <p>Xem và cập nhật thông tin cá nhân</p>
            </div>
        </a>
        <a id="change_pw" href="index.php?id=login&idlogin=change_pw">
            <div id="icon"><img src="img/logo/pw.png" alt=""/></div>
            <div id="feature">
                <b>Thay đổi mật khẩu</b>
                <p>Thay đổi và cập nhật mật khẩu mới</p>
            </div>
        </a>
        <a id="bill" href="index.php?id=login&idlogin=bill">
            <div id="icon"><img src="img/logo/bill.jpg" alt=""/></div>
            <div id="feature">
                <b>Đơn đặt hàng</b>
                <p>Quản lý các đơn hàng đã đặt</p>
            </div>
        </a>
        <a id="logout" href="index.php?id=login&logout=logout">
            <div id="icon"><img src="img/logo/logout.png" alt=""/></div>
            <div id="feature">
                <b>Đăng xuất</b>
                <p>Người dùng thoát khỏi hệ thống</p>
            </div>
        </a>

    </div>

    <div id="profile_right">
        <?php
        if(!isset($_GET['idlogin'])){
            include 'info_login.php';?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#info_login").css('background','#fff');
                })
                    </script>
        <?php
        }
        if(isset($_GET['idlogin']))
        {
            $idlogin=$_GET['idlogin'];
            switch ($idlogin)
            {
                case 'info_login':
                    include 'info_login.php';?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#info_login").css('background','#fff');
                        })
                    </script>
                    <?php break;
                case 'info_user':
                    include 'info_user.php';?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#info_user").css('background','#fff');
                        })
                     </script>
                    <?php break;
                case 'change_pw':
                    include 'change_pw.php';?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#change_pw").css('background','#fff');
                        })
                    </script>
                    <?php break;
                case 'bill':
                    include 'list_bill.php';?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#bill").css('background','#fff');
                        })
                    </script>
                    <?php break;
                case 'user_update':
                    include 'user_update.php';
                    break;
                case 'bill_detail':
                    include 'bill_detail.php';
                    break;
                default : echo 'Không tồn tại trang này';
            }
        }
        ?>
    </div>
</div>

</body>

</html>