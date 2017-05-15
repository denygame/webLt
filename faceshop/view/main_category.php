<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <link href="css/main_category.css" type="text/css" rel="stylesheet"/>


<?php //khởi tạo
require_once 'controller/BookController.php'; $bController = new BookController();
require_once 'controller/AuthorController.php'; $authorController = new AuthorController();
require_once 'controller/CategoryController.php'; $cateController = new CategoryController();
require_once 'controller/TypeController.php'; $typeController = new TypeController();

if(!isset($_GET['sort'])) $sort = "normal"; else $sort=$_GET['sort'];

    if (isset($_GET['idtype'])) {
        $idtype = $_GET['idtype'];
        $listInfoPage = $bController->getInfoPageBook($idtype, 1);
        $start = $listInfoPage['start'];
        $listBook = $bController->getListBookInType($idtype, $start, $sort);
        $str='idtype='.$_GET["idtype"].''; //dùng gán cho sort
    }

    if (isset($_GET['idcategory'])) {
        $idcategory = $_GET['idcategory'];
        $listInfoPage = $bController->getInfoPageBook($idcategory, 0);
        $start = $listInfoPage['start'];
        $listBook = $bController->getListBookInCate($idcategory, $start, $sort);
        $str='idcategory='.$_GET["idcategory"].'';
    }

    if(isset($_GET['search'])) {
      $search=$_GET['search'];
      $listInfoPage = $bController->getInfoPageBook($search, 2);   
      $start = $listInfoPage['start'];           
      $listBook=$bController->getListBookInSearch($search,$sort,$start);
      $str='search='.$search;
  }


  $current_page = $listInfoPage['current_page'];
  $total_page = $listInfoPage['total_page'];
  if ($current_page > $total_page) { $current_page = $total_page; } else if ($current_page < 1) { $current_page = 1; }
  ?>




  <script type="text/javascript">
    function showPage(){
        var sel = document.getElementById('dk');
        switch(sel.selectedIndex){
            case 0: document.getElementById("frmSort").action="index.php?id=category&<?php echo $str ?>&sort=ten";
            document.getElementById("frmSort").submit();
            break;
            case 1: document.getElementById("frmSort").action="index.php?id=category&<?php echo $str ?>&sort=ban_chay";
            document.getElementById("frmSort").submit();
            break;
            case 2: document.getElementById("frmSort").action="index.php?id=category&<?php echo $str ?>&sort=giam_gia";
            document.getElementById("frmSort").submit();
            break;
            case 3: document.getElementById("frmSort").action="index.php?id=category&<?php echo $str ?>&sort=gia_tang";
            document.getElementById("frmSort").submit();
            break;
            case 4: document.getElementById("frmSort").action="index.php?id=category&<?php echo $str ?>&sort=gia_giam";
            document.getElementById("frmSort").submit();
            break;
        }
    }
</script>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/countBookSC.js"></script>

</head>

<body>
<div id="category">
    <div id="selective">
        <form name="frmSort" id="frmSort" method="post" action="">
            <select name="dk" id="dk" style=" float: left" ">
            <option value="ten"<?php if (isset($sort) && $sort=="ten") echo "selected";?> >Theo tên</option>
            <option value="ban_chay"<?php if (isset($sort) && $sort=="ban_chay") echo "selected";?> >Bán chạy nhất</option>
            <option value="giam_gia"<?php if (isset($sort) && $sort=="giam_gia") echo "selected";?> >Giảm giá nhiều nhất</option>
            <option value="gia_tang"<?php if (isset($sort) && $sort=="gia_tang") echo "selected";?> >Giá từ thấp đến cao</option>
            <option value="gia_giam"<?php if (isset($sort) && $sort=="gia_giam") echo "selected";?> >Giá từ cao đến thấp</option>
            </select>

            <a href="index.php?<?php if(!isset($search)) echo'id=category&';?><?php echo $str ?>&sort=giam_gia" id="a_giam_gia_nhieu">Giảm giá nhiều nhất</a>
            <a href="index.php?<?php if(!isset($search)) echo'id=category&';?><?php echo $str ?>&sort=ban_chay" id="a_ban_chay_nhat"> Bán chạy nhất</a>
            <a href="index.php?<?php if(!isset($search)) echo'id=category&';?><?php echo $str ?>&sort=gia_tang" id="a_giam_thap_cao">Giá từ thấp đến cao</a>
            <button type="submit" onclick="showPage()" ><img src="img/logo/icon_select.png" alt=""/></button>

        </form>
    </div>

    <?php   if(!isset($search)){ ?>
        <div id="tieude2"> <?php if (isset($_GET['idcategory'])) echo $cateController->getNameCate($idcategory)['name']; else echo $typeController->getNameType($idtype)['name']; ?></div>
    <?php } ?>

    <div id="sach_cungloai2">
        <?php if ($listBook != null) {
            while ($d = mysql_fetch_array($listBook)) { ?>
                <div id="sach2">
                    <div id="hinhsach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>"><img
                                    src="img/<?php echo $d['imgdetail']; ?>"/></a></div>
                    <div id="tensach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>">
                            <p><?php echo $d['name']; ?></p></a>
                    </div>
                    <div id="mota2"><?php $idAuthor = $d['idauthor'];
                        $nameAuthor = $authorController->getNameAuthorById($idAuthor);
                        if ($nameAuthor != null) { ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                    </div>
                    <div id="gia2">
                        <p>Giá bán: <font
                                    style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                        <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                    </div>
                    <div id="km2"><?php echo $d['saleoff']; ?>%</div>

                    <div id="dathang2"><button class="btn" onclick="doSomething('<?php echo $d['idbook'];?>');">&#9758 Chọn mua</button></div>
                </div>
            <?php } } else echo 'Không có sách nào!'; ?>
    </div>

   <div id="phantrang">
       <center>
            <?php
            if (isset($search))$str='search='.$search.'&sort='. $sort.'';
            if (isset($idcategory)) $str = 'idcategory=' . $idcategory.'&sort='.$sort.'';
            if (isset($idtype)) $str = 'idtype=' . $idtype.'&sort='.$sort.'';
            $bController->pageBook($str,$current_page,$total_page);
            ?>
       </center>
        </div>
</div>


    <?php
    unset($_GET['sort']);
    unset($_GET['idtype']);
    unset($_GET['idcategory']);?>
</body>
</html>