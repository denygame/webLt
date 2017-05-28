<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin_bill.css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/admin_book.js"></script>



    <?php
    function delete($idbill){
        mysql_query("update bill set checkDelete=1 WHERE idbill= $idbill");
    }

    if(isset($_POST['save'])){
        foreach ($_POST['delete'] as $value)
        {
            delete($value);
            echo  "<script> alert('".$value."'); </script>";
        }

    }
    ?>
    <script type="text/javascript">
      
    </script>
</head>

<body>
<div id="manage_bill">
    <div id="head_bill"></div>
    <div id="h1">
        <h1>QUẢN LÝ HÓA ĐƠN</h1>
        <form id="f2" action="" method="post">
            <input type="text" name="find"/>
            <button>Tìm</button>
        </form>
    </div>
    <form action="index.php?admin=manage_bill" method="post">
        <input type="submit" value="Xóa" name="save" id="save"/>
    <table width="100%">
        <tr id="tt">
            <th id="delete"><input type="checkbox" onclick="toggle(this)" name=""></th>
            <th id="name">Tên đăng nhập</th>
            <th id="email">Email</th>
            <th id="tel">Số điện thoại</th>
            <th id="city">Tỉnh/ Thành phố</th>
            <th id="district">Quận Huyện</th>
            <th id="totalprice">Tổng hóa đơn</th>
            <th>Xem chi tiết</th>
        </tr>
    </table>
    <div id="main_manage_bill">
        <table>
                <?php
                $sql="select * from bill WHERE checkDelete=0";
                $kq=mysql_query($sql);
                while($d=mysql_fetch_array($kq)){?>
                    <tr>
                        <td id="delete"><input type="checkbox" name="delete[]" value="<?php $idbill=$d['idbill']; echo $idbill?>"/></td>
                        <td id="name"><?php echo $d['name']; ?> </td>
                        <td id="email"><?php echo $d['email'] ?></td>
                        <td id="tel"><?php echo $d['tel'] ?></td>
                        <?php
                        $idcity = $d['idcity'];
                        $sqlcity = "select * from city WHERE idcity=$idcity";
                        $kqcity = mysql_query($sqlcity);
                        $dcity = mysql_fetch_array($kqcity);
                        ?>
                        <td id="city"><?php echo $dcity['name'] ?></td>
                        <td id="district"><?php echo $d['district'] ?></td>
                        <td id="totalprice" style="font-size: 22px; color: #CC6600">
                        <?php
                        // tính tổng tiền của hóa đơn

                        $total=0;
                        $kqinfo = mysql_query("select * from billinfo WHERE idbill=$idbill");
                        while ($dinfo = mysql_fetch_array($kqinfo)) {
                                $idbook = $dinfo['idbook'];
                                $kqbook = mysql_query("select * from book WHERE  idbook=$idbook");
                                $dbook = mysql_fetch_assoc($kqbook);
                                $price= $dbook['price']*(1-$dbook['saleoff']/100);
                                $total=$total+ $price * $dinfo['count'] ;
                        }
                        echo number_format($total);
                            ?>đ
                        </td>
                        <td><a href="index.php?admin=manage_bill_detail&idbill=<?php echo $d['idbill'] ?>">Xem chi tiết</a> </td>
                    </tr>
                    <?php
                }
                ?>

        </table>

        </form>
    </div>
    <center><p>Phân trang</p></center>
</div>
</body>
</html>
