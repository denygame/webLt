<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/main_category.css" type="text/css" rel="stylesheet"/>
</head>

<body>
    <?php
    include 'others/connect.php';
    if(isset($_GET['idcategory']))
    {
        $idcategory=$_GET['idcategory'];
        $s="select * from category WHERE  idcategory='$idcategory';";
        $k=mysql_query($s);
        $t=mysql_fetch_assoc($k);
        ?>
        <div id="tieude2"> <?php echo $t['name']?></div>
            <div id="sach_cungloai2">
            <?php
                $sql="select * from db_type  WHERE  idcategory='$idcategory';";
                $kq=mysql_query($sql);
                while($d=mysql_fetch_array($kq))
                {
                    $type=$d['idtype'];?>
                    <?php $sql_type= " select * from book WHERE idtype=$type";
                    $kq_type=mysql_query($sql_type);
                    while ($d_type=mysql_fetch_array($kq_type))
                    {
                    ?>
                    <div id="sach2">
                        <div id="hinhsach2"><a href="index.php?id=sach&idbook=<?php echo $d_type['idbook'];?>"><img src="img/<?php echo $d_type['imgdetail'];?>" /></a></div>
                        <div id="tensach2"><a href="index.php?id=sach&idbook=<?php echo $d_type['idbook'];?>"><p><?php echo $d_type['name'];?></p></a></div>
                        <div id="mota2">
                            <?php
                            $idauthor=$d_type['idauthor'];
                            $tg="select *from author WHERE idauthor=$idauthor";
                            $kq_tg=mysql_query($tg);
                            while ($d_tg=mysql_fetch_array($kq_tg))
                            {
                                ?>
                                <p><?php echo $d_tg['name']; ?></p>
                                <?php
                            } ?>
                        </div>
                        <div id="gia2">
                            <p>Giá bán: <font style="color:#C60"><?php echo number_format($d_type['price']*(1-(($d_type['saleoff'])/100)));?> đ</font></p>
                            <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d_type['price']);?> đ</font></p>
                        </div>
                        <div id="km2"><?php echo $d_type['saleoff']; ?>%</div>
                        <div id="dathang2"><a href="#">&#9758 Đặt hàng</a></div>
                    </div>
             <?php }
                }?>
            </div>
    <?php
    }
    else
    { ?>
    <?php
        $idtype2=$_GET['idtype'];
        $sql_type_2="select *from db_type WHERE idtype=$idtype2";
        $kq_type_2=mysql_query($sql_type_2);
        while($d_type2=mysql_fetch_array($kq_type_2))
        {
            ?>
            <div id="tieude2"> <?php echo $d_type2['name']?></div>
            <div id="sach_cungloai2">
            <?php
            $sql_book="select *from book WHERE idtype=$idtype2";
            $kq_book=mysql_query($sql_book);
            while($d_book=mysql_fetch_array($kq_book))
            {
            ?>

            <div id="sach2">
                <div id="hinhsach2"><a href="index.php?id=sach&idbook=<?php echo $d_book['idbook'];?>"><img src="img/<?php echo $d_book['imgdetail'];?>" /></a></div>
                <div id="tensach2"><a href="index.php?id=sach&idbook=<?php echo $d_book['idbook'];?>"><p><?php echo $d_book['name'];?></p></a></div>
                <div id="mota2">
                    <?php
                    $idauthor=$d_book['idauthor'];
                    $tg="select *from author WHERE idauthor=$idauthor";
                    $kq_tg=mysql_query($tg);
                    while ($d_tg=mysql_fetch_array($kq_tg))
                    {
                        ?>
                        <p><?php echo $d_tg['name']; ?></p>
                        <?php
                    } ?>
                </div>
                <div id="gia2">
                    <p>Giá bán: <font style="color:#C60"><?php echo number_format($d_book['price']*(1-(($d_book['saleoff'])/100)));?> đ</font></p>
                    <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d_book['price']);?> đ</font></p>
                </div>
                <div id="km2"><?php echo $d_book['saleoff']; ?>%</div>
                <div id="dathang2"><a href="#">&#9758 Đặt hàng</a></div>
            </div>

            <?php
            }
            ?></div>
            <?php
        }
    }
    ?>
            

</body>
</html>