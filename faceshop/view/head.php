<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/head.css"/>
</head>

<body>

<?php require_once 'controller/CategoryController.php'; $cateController = new CategoryController();
require_once 'controller/TypeController.php'; $typeController = new TypeController();?>

    <div id="head">
        <div id="h1">
            <div id="logo"><a href="index.php"><img src="img/logo_anybooks.png"/></a></div>
            <div id="lienhe">
                <div style="width:250px; float:left; margin-top: 20px; font-size: 18px;">
                    <p>Hà Nội: <a href="#">0965. 196. 801</a></p>
                    <p>Hồ Chí Minh: <a href="#"> 0938. 898. 857</a></p>
                </div>
                <div style="width:150px; float:right; margin-top: 20px; font-size: 18px;">
                    <p>Liên hệ<br/>
                        <a href="#"> sales@anybooks.vn</a>
                    </p>
                </div>
            </div>
        </div>
        <div id="h2">
            <div id="danhmuc"><p style="text-align:center; width:100%; margin-top:13px; font-size:20px;"><a href="#" style="text-decoration:none; color:#000;"><i class="fa fa-bars"></i> <b>Danh mục sách</b></a></p>
                <div id="test"></div>
                <div id="bao">
                    <?php  $resultCate=$cateController->loadCategory(); if ($resultCate != null) while ($d = mysql_fetch_array($resultCate)) {
                        $idCategory=$d['idcategory']; ?>
                                <div id="muc">
                                    <a href="index.php?id=danhmuc&idcategory=<?php echo $d['idcategory'] ?>"><b><?php echo $d['name']?></b></a>
                                    <?php  $resultType=$typeController->loadTypeOfCategory($idCategory); if ($resultType != null) while ($d2 = mysql_fetch_array($resultType)) {?>
                                        <p style="margin-top: 5px;"><a  href="index.php?id=danhmuc&idtype=<?php echo $d2['idtype'];?>"><?php echo $d2['name'];?></a></p>
                                    <?php }else echo 'Lỗi không có thể loại'?>
                                </div>
                            <?php } ?>

                    </div>

            </div>
            <div id="timkiem">
                <form action="" method="" style="margin-top:12px;">
                    <label style="font-size:20px; margin-left:25px;">Bạn muốn tìm sách gì?</label>
                    <input name="" type="text" id=" " style="font-size:20px; width:400px; margin-left:25px;"/>
                    <input type="submit" value="Tìm kiếm"  style=" font-size:20px; float:right; margin-top:-12px; height:50px; background-color:#F03; color:#FFF; width:120px; border-style:none;"/>
                </form>
            </div>
        </div>

        <div id="taikhoan"><center><img src="img/icon_taikhoan.png" width="25px"/><br />Tài<br /> khoản</center>
            <div id="tk">
            	<?php include('account.php');?>
            </div>
        </div>
        
        <div id="giohang"><center><img src="img/icon_giohang.png" width="40px" /><br />Giỏ<br /> hàng</center>
            <div class="gh">
            	
            </div>
        </div>
    </div>
</body>
</html>