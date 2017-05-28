<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link  rel="stylesheet" type="text/css" href="css/admin_book_detail.css"/>
  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BookController.php'; $b = new BookController();
  require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/AuthorController.php'; $au=new AuthorController();
  require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/TypeController.php'; $type=new TypeController();
 ?>
</head>

<body>
  <div id="admin_book_detail">
    <table>
      <h1>CHI TIẾT SÁCH
        <a style="text-align: right" href="index.php?admin=manage_book_update&idbook=<?php echo $_GET['idbook'];?>">
          <img src="../img/logo/book_update.png" width="18px;"/> Chỉnh sửa
        </a>
      </h1>

      <?php if(isset($_GET['idbook'])) {
        $kq=$b->getBookById($_GET['idbook']);
        if($kq!=null){ $d=$kq;
        ?>
        <tr>
          <td id="label">Tên sách:</td>
          <td id="valuse"><?php echo $d['name'] ?></td>
        </tr>
        <tr>
          <td id="label">Hình nền:</td>
          <td id="valuse"><img src="../img/<?php echo $d['imgbg'] ?>" height="50px;" alt=""/><?php echo $d['imgbg'] ?></td>
        </tr>
        <tr>
          <td id="label">Hình ảnh chi tiết: </td>
          <td id="valuse"><img src="../img/<?php echo $d['imgdetail'] ?>" height="50px;" alt=""/><?php echo $d['imgdetail'] ?></td>
        </tr>
        <tr>
          <td id="label">Tên tác giả:</td>
          <?php $idauthor=$d['idauthor'];
          $dtg=$au->getNameAuthorById($idauthor);
          if($dtg!=null){ ?>
          <td id="valuse"><?php echo $dtg['name'] ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td id="label">Ngày xuất bản:</td>
          <td id="valuse"><?php echo $d['ngayxb'] ?></td>
        </tr>
        <tr>
          <td id="label">Nhà xuất bản:</td>
          <td id="valuse"><?php echo $d['nhaxb'] ?></td>
        </tr>
        <tr>
          <td id="label">Nhà phát hành:</td>
          <td id="valuse"><?php echo $d['nhaph'] ?></td>
        </tr>
        <tr>
          <td id="label">Dạng bìa:</td>
          <td id="valuse"><?php echo $d['dangbia'] ?></td>
        </tr>
        <tr>
          <td id="label">Kích thước:</td>
          <td id="valuse"><?php echo $d['size'] ?></td>
        </tr>
        <tr>
          <td id="label">Khối lượng:</td>
          <td id="valuse"><?php echo $d['weight'] ?></td>
        </tr>
        <tr>
          <td id="label">Số trang:</td>
          <td id="valuse"><?php echo $d['totalpages'] ?></td>
        </tr>
        <tr>
          <td id="label">Khuyến mãi:</td>
          <td id="valuse"><?php echo $d['saleoff'] ?></td>
        </tr>
        <tr>
          <td id="label">Giá:</td>
          <td id="valuse"><?php echo $d['price'] ?></td>
        </tr>
        <tr>
          <td id="label">Tóm tắt:</td>
          <td id="valuse"><?php echo $d['info'] ?></td>
        </tr>
        <tr>
          <td id="label">Thể loại:</td>
          <?php $idtype=$d['idtype'];
          $dtype=$type->getNameType($idtype);
          if($dtype!=null){ ?>
          <td id="valuse"><?php echo $dtype['name'] ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td id="label">Mức nổi bậc:</td>
          <td id="valuse"><?php echo $d['highlights'] ?></td>
        </tr>
        <tr>
          <td id="label">Trạng thái:</td>
          <td id="valuse"><?php echo $d['status'] ?></td>
        </tr>
        <tr>
          <td id="label">Số lượng đã bán:</td>
          <td id="valuse"><?php echo $d['sold'] ?></td>
        </tr>
        <tr>
          <td id="label">Kiểm tra xóa:</td>
          <td id="valuse"><?php echo $d['checkDelete'] ?></td>
        </tr>
        <tr>
          <td></td>
          <td><a href="index.php?admin=manage_book">Quay lại</a> </td>
        </tr>
      </table>



    </div>
    <?php } } ?>


</body>
</html>
