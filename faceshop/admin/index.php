<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/indexcss.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php
        
        session_start();
        if(isset($_GET['idlogout']) && isset($_SESSION['emailAdmin']))
        {
                session_unset();
                session_destroy();
        }
        require_once 'controller/DB_Connect.php';
        $con = new DB_Connect();
        $con->connect();
        require_once 'controller/AccountController.php';
        $acc = new AccountController();
     ?>


</head>

<body>
<div id="container">
    <?php
    if (!isset($_SESSION['emailAdmin'])) {
        ?>
        <div id="login">
            <div id="head_login">
                <div id="img">
                    <img src="../img/logo/logo.jpg" width="300px;" />
                </div>
            </div>
            <table>
                <form action="" method="post">
                    <tr>
                        <th>Admin</th>
                    </tr>
                    <tr>
                        <td id="values"><input type="text" name="email" placeholder="example@gmail.com"/></td>
                    </tr>
                    <tr>
                        <td id="values"><input type="password" name="password" placeholder="Password"/></td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="btn_submit">LOGIN</button>
                        </td>
                    </tr>
                </form>
                <?php $acc->login(); ?>
            </table>
        </div>
        <?php
    } else {
        ?>
        <div id="head"><?php include('view/admin_head.php'); ?></div>
        <div id="main">
            <div id="main_left">
                <?php include 'view/admin_main_left.php'; ?>
            </div>
            <div id="main_right">
                <?php
                if (!isset($_GET['admin'])) {
                    include 'view/admin_book.php';
                } else {
                    $admin = $_GET['admin'];
                    switch ($admin) {
                        case 'manage_book':
                            include 'view/admin_book.php';
                            break;
                        case 'manage_book_detail':
                            include 'view/admin_book_detail.php';
                            break;
                        case 'manage_book_insert':
                            include 'view/admin_book_insert.php';
                            break;
                        case 'manage_book_update':
                            include 'view/admin_book_update.php';
                            break;
                        case 'manage_account':
                            include 'view/admin_account.php';
                            break;
                        case 'manage_account_insert':
                            include 'view/admin_account_insert.php';
                            break;
                        case 'manage_bill':
                            include 'view/admin_bill.php';
                            break;
                        case 'manage_bill_detail':
                            include "view/admin_bill_detail.php";
                            break;
                        case 'manage_category':
                            include 'view/admin_category.php';
                            break;
                        case 'manage_type':
                            include 'view/admin_type.php';
                            break;
                        case 'manage_delete':
                            include 'view/admin_delete.php';
                            break;
                        default :echo 'không có trang này';
                    }
                }
                ?>
            </div>
        </div>
        <div id="foot"></div>
        <?php
    } ?>
</div>
</body>
</html>