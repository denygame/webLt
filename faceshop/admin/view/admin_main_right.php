<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="admin_main_right">
    <?php
    if(!isset($_GET['admin'])){
        include 'view/admin_book.php';
    }
    else{
        $admin=$_GET['admin'];
        switch ($admin)
        {
            case 'manage_book':include 'view/admin_book.php'; break;
            case 'manage_account':
                include 'view/admin_account.php'; break;
            case 'manage_bill':
                include 'view/admin_bill.php';break;
            case 'manage_category':
                include 'view/admin_category.php';break;
            case 'manage_type':
                include 'view/admin_type.php';break;
        }
    }
    ?>

</div>
</body>
</html>