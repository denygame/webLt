<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin_delete.css"/>
    <?php
    function restoreBook($idbook){
        mysql_query("update book set checkDelete =0 WHERE idbook=$idbook");
    }
    if(isset($_POST['btnbook']))
    {
        foreach ($_POST['restoreB'] as $value)
        {
            restoreBook($value);
        }
        //echo "<script> alert('Đã khôi phục thành công!'); </script>";
    }
    function restoreAccount($email){
        mysql_query("update account set checkDelete =0 WHERE email='$email'");
    }
    if(isset($_POST['btnaccount']))
    {
        foreach ($_POST['restoreA'] as $value)
        {
            restoreAccount($value);
        }
        //echo "<script> alert('Đã khôi phục thành công!'); </script>";
    }
    function restoreCategory($idcategory){
        mysql_query("update category set checkDelete =0 WHERE idcategory=$idcategory");
    }
    if(isset($_POST['btncategory']))
    {
        foreach ($_POST['restoreC'] as $value)
        {
            restoreCategory($value);
        }
        //echo "<script> alert('Đã khôi phục thành công!'); </script>";
    }
    function restoreType($idtype){
        mysql_query("update db_type set checkDelete =0 WHERE idtype=$idtype");
    }
    if(isset($_POST['btntype']))
    {
        foreach ($_POST['restoreT'] as $value)
        {
            restoreType($value);
        }
        //echo "<script> alert('Đã khôi phục thành công!'); </script>";
    }
    function restoreBill($idbill){
        mysql_query("update bill set checkDelete =0 WHERE idbill=$idbill");
    }
    if(isset($_POST['btnbill']))
    {
        foreach ($_POST['restoreBi'] as $value)
        {
            restoreBill($value);
        }
        //echo "<script> alert('Đã khôi phục thành công!'); </script>";
    }
    ?>
</head>

<body>
<div id="manage_delete">
    <div id="head_delete"></div>
    <div id="h1">
        <h1>QUẢN LÝ THÙNG RÁC</h1>
        <form id="f2" action="" method="post">
            <input type="text" name="find"/>
            <button>Tìm</button>
        </form>
    </div>
    <div id="h2">
        <form action="index.php?admin=manage_delete" method="post">
            <div id="select">
                <script type="text/javascript">
                    function myFunction() {
                        var x= document.getElementById("select2").value;
                        location.href="index.php?admin=manage_delete&delete="+x;
                    }
                </script>
                <?php
                function getX(){
                    $x= "<script> myFunction() </script>";
                    return $x;
                    echo $x;
                }
                ?>
                <select  id="select2" onchange="myFunction()">
                    <?php
                    if($_GET['delete']=='book' && isset($_GET['delete']) || isset($_POST['btnbook']))
                    {?>
                        <option value="book">SÁCH</option>
                        <option value="account">TÀI KHOẢN</option>
                        <option value="category">DANH MỤC</option>
                        <option value="type">THỂ LOẠI</option>
                        <option value="bill">HÓA ĐƠN</option>
                        <?php
                    }
                    if($_GET['delete']=='account' && isset($_GET['delete']) || isset($_POST['btnaccount']) )
                    {?>
                        <option value="account">TÀI KHOẢN</option>
                        <option value="book">SÁCH</option>
                        <option value="category">DANH MỤC</option>
                        <option value="type">THỂ LOẠI</option>
                        <option value="bill">HÓA ĐƠN</option>
                        <?php
                    }
                    if($_GET['delete']=='category' && isset($_GET['delete']) || isset($_POST['btncategory']))
                    {?>
                        <option value="category">DANH MỤC</option>
                        <option value="book">SÁCH</option>
                        <option value="account">TÀI KHOẢN</option>
                        <option value="type">THỂ LOẠI</option>
                        <option value="bill">HÓA ĐƠN</option>
                        <?php
                    }
                    if($_GET['delete']=='type'&& isset($_GET['delete'])|| isset($_POST['btntype'])  )
                    {?>
                        <option value="type">THỂ LOẠI</option>
                        <option value="book">SÁCH</option>
                        <option value="account">TÀI KHOẢN</option>
                        <option value="category">DANH MỤC</option>
                        <option value="bill">HÓA ĐƠN</option>
                        <?php
                    }
                    if($_GET['delete']=='bill' && isset($_GET['delete']) || isset($_POST['btnbill']) )
                    {?>
                        <option value="bill">HÓA ĐƠN</option>
                        <option value="book">SÁCH</option>
                        <option value="account">TÀI KHOẢN</option>
                        <option value="category">DANH MỤC</option>
                        <option value="type">THỂ LOẠI</option>
                        <?php
                    }
                    if(!isset($_GET['delete']) )
                    {?>
                        <option value="book">SÁCH</option>
                        <option value="account">TÀI KHOẢN</option>
                        <option value="category">DANH MỤC</option>
                        <option value="type">THỂ LOẠI</option>
                        <option value="bill">HÓA ĐƠN</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </form>
    </div>
    <div id="show">
    <?php
    if(!isset($_GET['delete']) )
    {
        include "delete_book.php";
    }
    else{
        if( isset($_GET['delete'])&& $_GET['delete']=='book' ){
            include 'view/delete_book.php';
            return;
        }
        if(isset($_GET['delete'])&& $_GET['delete']=='account' ){
            include 'view/delete_account.php';
            return;
        }
        if( isset($_GET['delete'])&& $_GET['delete']=='category' ){
            include 'view/delete_category.php';
            return;
        }
        if( isset($_GET['delete'])&& $_GET['delete']=='bill' ){
            include 'view/delete_bill.php';
            return;
        }
        if( isset($_GET['delete'])&& $_GET['delete']=='type' ){
            include 'view/delete_type.php';
            return;
        }
    }
    ?>
    </div>
    <div id="phantrang">
        <center><p>Phân trang</p></center>
    </div>

</div>

</body>
</html>