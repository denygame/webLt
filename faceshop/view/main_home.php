<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/main_home.css"/>
    <link rel="stylesheet" type="text/css" href="css/main_category.css"/>
</head>

<body>
<?php //libary
    require_once 'controller/BookController.php'; $bController = new BookController();
    require_once 'controller/AuthorController.php'; $authorController = new AuthorController(); ?>
<div id="main_home">
    <div id="slide"></div>
    <div id="sach_noibat">
        <div id="tieude"><p>Sách nổi bật</p></div>
        <div style="min-height: 1100px;">
            <?php  $result=$bController->load6BookHighlight(); if ($result!=null) while ($d = mysql_fetch_array($result)) { ?>
                    <div id="sach">
                        <div id="hinhsach"><a href="index.php?id=sach&idbook=<?php echo $d['idbook']; ?>" ?><img width="300px" src="img/<?php echo $d['imgbg']; ?>"/></a></div>
                        <div id="tensach"><a href="index.php?id=sach&idbook=<?php echo $d['idbook']; ?>" ?><p><?php echo $d['name']; ?></p></a></div>
                        <hr/>
                        <div id="mota">
                            <?php $idAuthor = $d['idauthor'];$nameAuthor = $authorController->getNameAuthorById($idAuthor); if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                            <p style="overflow: hidden; width: 90%; height: 50px;"><?php echo $d['info']; ?></p>
                        </div>
                        <hr/>
                        <div id="gia">
                            <div id="gia1">
                                <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                                <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                            </div>
                            <div id="km"><?php echo $d['saleoff']; ?>%</div>
                        </div>
                        <div id="dathang">
                            <a href="#">&#9758 Chọn mua</a>
                        </div>
                    </div>
                    <?php } else echo 'Lỗi truy vẩn!'; ?>
        </div>
    </div>
    <hr/>
    <div id="sach_moi">
        <div id="tieude"><p>Sách mới</p></div>
        <div id="sach_cungloai2">
            <?php $result=$bController->load12BookNew(); if ($result!=null) while ($d = mysql_fetch_array($result)) { ?>
                    <div id="sach2">
                        <div id="hinhsach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook']; ?>"><img src="img/<?php echo $d['imgdetail']; ?>"/></a></div>
                        <div id="tensach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook']; ?>"><p><?php echo $d['name']; ?></a></div>
                        <div id="mota2">
                            <?php if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                        </div>
                        <div id="gia2">
                            <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                            <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                        </div>
                        <div id="km2"><?php echo $d['saleoff']; ?>%</div>
                        <div id="dathang2"><a href="#">&#9758 Đặt hàng</a></div>
                    </div>
                    <?php } else echo 'Lỗi truy vẩn!'; ?>
        </div>
    </div>
    <hr/>
    <div id="sach_sapra">
        <div id="tieude"><p>Sách sắp ra mắt</p></div>
        <div style="min-height: 400px;">
            <?php $result=$bController->load6BookFuture(); if ($result!= null) while ($d= mysql_fetch_array($result)) { ?>
                    <div id="sach2">
                        <div id="hinhsach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook']; ?>"><img src="img/<?php echo $d['imgdetail']; ?>"/></a></div>
                        <div id="tensach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook']; ?>"><p><?php echo $d['name']; ?></a></div>
                        <div id="mota2">
                            <?php if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                        </div>
                        <div id="gia2">
                            <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                            <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                        </div>
                        <div id="km2"><?php echo $d['saleoff']; ?>%</div>
                        <div id="dathang2"><a href="#">&#9758 Đặt hàng</a></div>
                    </div>
            <?php } else echo 'Lỗi truy vẩn!'; ?>
        </div>
    </div>
</div>
</body>
</html>