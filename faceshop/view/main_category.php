<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="css/main_category.css" type="text/css" rel="stylesheet"/>
</head>

<body>
    <?php require_once 'controller/BookController.php'; $bController = new BookController();
    require_once 'controller/AuthorController.php'; $authorController = new AuthorController();
    require_once 'controller/CategoryController.php'; $cateController = new CategoryController();
    require_once 'controller/TypeController.php'; $typeController = new TypeController();



    if(isset($_GET['idtype']))
    { 
        $idtype=$_GET['idtype'];
        $listInfoPage = $bController->getInfoPageBook($idtype,1);
        $start = $listInfoPage['start'];
        $listBook = $bController->getListBookInType($idtype,$start);}
    if(isset($_GET['idcategory'])) {
        $idcategory=$_GET['idcategory'];
        $listInfoPage = $bController->getInfoPageBook($idcategory,0);
        $start = $listInfoPage['start'];
        $listBook = $bController->getListBookInCate($idcategory,$start);
    }

    $current_page = $listInfoPage['current_page'];
    $total_page = $listInfoPage['total_page'];

    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    ?>




    <div id="tieude2"> <?php if(isset($_GET['idcategory'])) echo $cateController->getNameCate($idcategory)['name'];else echo $typeController->getNameType($idtype)['name'];?></div>
    <div id="sach_cungloai2">

        <?php if($listBook!=null){ while ($d=mysql_fetch_array($listBook)) {?>
        <div id="sach2">
            <div id="hinhsach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook'];?>"><img src="img/<?php echo $d['imgdetail'];?>" /></a></div>
            <div id="tensach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook'];?>"><p><?php echo $d['name'];?></p></a></div>
            <div id="mota2"><?php $idAuthor = $d['idauthor'];$nameAuthor = $authorController->getNameAuthorById($idAuthor); if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?></div>
            <div id="gia2">
                <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price']*(1-(($d['saleoff'])/100)));?> đ</font></p>
                <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']);?> đ</font></p>
            </div>
            <div id="km2"><?php echo $d['saleoff']; ?>%</div>
            <div id="dathang2"><a href="#">&#9758 Đặt hàng</a></div>
        </div>
        <?php } } else echo 'Không có sách nào!';?>
    </div>


    <div class="pagination">
     <?php 

        if(isset($idcategory)) $str = 'idcategory='.$idcategory;
        if(isset($idtype))$str='idtype='.$idtype;
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
     if ($current_page > 1 && $total_page > 1){
        echo '<a href="index.php?id=danhmuc&'.$str.'&page='.($current_page-1).'">Prev</a> | ';
    }

            // Lặp khoảng giữa
    for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
        if ($i == $current_page){
            echo '<span>'.$i.'</span> | ';
        }
        else{
            echo '<a href="index.php?id=danhmuc&'.$str.'&page='.$i.'">'.$i.'</a> | ';
        }
    }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
    if ($current_page < $total_page && $total_page > 1){
        echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
    }
    ?>
</div>
</body>
</html>