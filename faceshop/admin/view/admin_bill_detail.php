<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin_bill_detail.css"/>
    <script type="text/javascript">
        function goback() {
            window.history.back();
        }
    </script>
</head>

<body>
<div id="admin_bill_detail">
    <table>
        <h1>CHI TIẾT HÓA ĐƠN</h1>
        <?php
        if(isset($_GET['idbill']))
        {
        $idbill = $_GET['idbill'];
        $kq = mysql_query("select * from bill WHERE  idbill=$idbill");
        $d = mysql_fetch_assoc($kq);
        if($d['checkDelete']==1)
        {
            echo '<a href="index.php?admin=manage_delete" onclick="goback()">Quay lại</a> ';
        }
        ?>
        <tr>
            <td id="label">Tên người đặt hàng:</td>
            <td id="values"><?php echo $d['name'] ?></td>
        </tr>
        <tr>
            <td id="label">Email:</td>
            <td id="values"><?php echo $d['email'] ?></td>
        </tr>
        <tr>
            <td id="label">Giới tính:</td>
            <td id="values"><?php echo $d['sex'] ?></td>
        </tr>
        <tr>
            <td id="label">Số điện thoại:</td>
            <td id="values"><?php echo $d['tel'] ?></td>
        </tr>
        <tr>
            <td id="label">Địa chỉ:</td>
            <td id="values"><?php echo $d['address'] ?></td>
        </tr>
        <tr>
            <td id="label">Quận/ Huyện:</td>
            <td id="values"><?php echo $d['district'] ?></td>
        </tr>
        <tr>
            <td id="label">Tỉnh/ Thành phố:</td>
            <?php
            $idcity = $d['idcity'];
            $kqcity = mysql_query("select * from city WHERE idcity=$idcity");
            $dcity = mysql_fetch_assoc($kqcity); ?>
            <td id="values"><?php echo $dcity['name']; ?></td>
        </tr>
    </table>

    <h2>Danh sách sản phẩm:</h2>
    <table>
        <tr>
            <th id="stt">STT</th>
            <th id="img">Hình</th>
            <th id="name">Tên sách</th>
            <th id="price">Giá</th>
            <th id="count">Số lượng</th>
            <th id="totalprice">Thành tiền</th>
        </tr>
        <?php
        $i = 0;
        $total=0;
        $kqinfo = mysql_query("select * from billinfo WHERE idbill=$idbill");
        while ($dinfo = mysql_fetch_array($kqinfo)) {
            ?>
            <tr>
                <td id="stt"><?php echo ++$i; ?></td>
                <?php
                $idbook = $dinfo['idbook'];
                $kqbook = mysql_query("select * from book WHERE  idbook=$idbook");
                $dbook = mysql_fetch_assoc($kqbook);
                ?>
                <td id="img"><a href="index.php?admin=manage_book_detail&idbook=<?php echo $idbook?> "><img src="../img/<?php echo $dbook['imgdetail'] ?>" /></a></td>
                <td id="name"><a href="index.php?admin=manage_book_detail&idbook=<?php echo $idbook?> "><?php echo $dbook['name'] ?></a></td>
                <?php $price= $dbook['price']*(1-$dbook['saleoff']/100);    ?>
                <td id="price"><?php echo number_format($price) ?>đ</td>
                <td id="count"><?php echo $dinfo['count'] ?></td>
                <td id="totalprice"><?php echo number_format($price * $dinfo['count'])?>đ</td>
                <?php $total=$total+ $price * $dinfo['count'] ;?>
            </tr>
        <?php
        }?>
        <tr>
            <td colspan="6" style="text-align: right">Tổng tiền: <font style="color: #CC6600; font-size: 25 px;"><?php echo number_format($total); ?>đ</font> </td>
        </tr>
        <tr>
            <td colspan="6"><a href="index.php?admin=manage_bill"> << Quay lại</a> </td>
        </tr>
        <?php
        }?>

    </table>
</div>
</body>
</html>