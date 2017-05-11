<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="css/index.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<?php require_once 'controller/DB_Connect.php'; $con = new DB_Connect(); $con->connect();?>
<div id="container">
    <div id="header"> <?php include 'view/head.php' ?></div>
    <div id="main">
        <?php
        if(!isset($_GET['id']))
        { include 'view/main_home.php';}
        else
        {
            $id=$_GET['id'];

            switch($id)
            {
                case'trangchu': include 'view/main_home.php'; break;
                case'sach': $bookController->showMainBook(); break;
                case'danhmuc':$bookController->showMainCategory(); break;
                default : echo'<div style="text-align:center; font-size:50px; height:63px;">Không có thông tin về trang này.</div>'; break;
            }
        }
        ?>
    </div>
    <div id="footer"><?php include'foot.php'?> </div>
</div>



</body>
</html>