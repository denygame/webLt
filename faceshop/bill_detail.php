<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link type="text/css" rel="stylesheet" href="css/bill_detail.css"/>
</head>

<body>

<div id="bill_detail">
    <table>
        <tr>
            <th id="stt">STT</th>
            <th id="name_book">Tên Sách</th>
            <th id="count">Số lượng</th>
            <th id="price">Giá</th>
        </tr>
    <?php
    if(isset($_GET['idbill']))
    {
        $idbill=$_GET['idbill'];
        $sql="select * from billinfo WHERE idbill=$idbill";
        $kq=mysql_query($sql);
        $i=0;
        while ($d=mysql_fetch_array($kq))
        {
            $idbook=$d['idbook'];
            $sql2="select * from book WHERE idbook=$idbook";
            $kq2=mysql_query($sql2);
            $d2=mysql_fetch_assoc($kq2);
            ?>
            <tr>
                <td id="stt"><?php $i++; echo $i;  ?></td>
                <td id="name_book"><a href="index.php?id=book&idbook=<?php echo $d2['idbook']; ?>"> <?php echo $d2['name'] ?> </a></td>
                <td id="count"><?php echo $d['count'] ?></td>
                <td id="price" style="color: #CC6600; font-style: oblique; font-size: 20px;">
                    <?php echo number_format($d['count']*$d2['price']*(1-($d2['saleoff']/100)));?>đ
                </td>
            </tr>
        <?php
        }
    }
    ?>
    </table>
</div>

</body>
</html>