<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/delete_bill.css"/>
</head>

<body>
<form action="index.php?admin=manage_delete" method="post">
    <input type="submit" value="Khôi phục" id="save" name="btnbill" />
    <table>
        <tr>
            <th id="check"></th>
            <th id="name">Tên đăng nhập</th>
            <th id="email">Email</th>
            <th id="tel">Số điện thoại</th>
            <th id="city">Tỉnh/ Thành phố</th>
            <th id="district">Quận Huyện</th>
            <th id="totalprice">Tổng hóa đơn</th>
            <th>Xem chi tiết</th>
        </tr>
        <?php
        $i=0;
        $kq=mysql_query("select * from bill WHERE  checkDelete =1");
        while ($d=mysql_fetch_array($kq))
        {
            $i++;
            ?>
            <tr>
                <td id="check"><input type="checkbox"  name="restoreBi[]" value="<?php echo $d['idbill']?>"/></td>
                <td id="name"><?php echo $d['name'] ?></td>
                <td id="email"><?php echo $d['email'] ?></td>
                <td id="tel"><?php echo $d['tel'] ?></td>
                <td id="city">
                    <?php
                    $idcity = $d['idcity'];
                    $sqlcity = "select * from city WHERE idcity=$idcity";
                    $kqcity = mysql_query($sqlcity);
                    $dcity = mysql_fetch_array($kqcity);
                    echo $dcity['name'];
                    ?>
                </td>
                <td id="district"><?php echo $d['district'] ?></td>
                <td id="totalprice">
                    <?php
                    // tính tổng tiền của hóa đơn
                    $idbill=$d['idbill'];
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
                <td><a href="index.php?admin=manage_bill_detail&idbill=<?php echo $d['idbill'] ?>">Xem chi tiết</a></td>
            </tr>
            <?php
        }
        if($i==0){
            //echo "<script> alert('Không có danh mục nào trong thùng rác !!!')</script>";
        }
        ?>

    </table>
</form>

</body>
</html>