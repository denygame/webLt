<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link  rel="stylesheet" type="text/css" href="css/admin_book_update.css"/>
  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BookController.php'; $b = new BookController();
  require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/TypeController.php'; $type=new TypeController(); ?>

  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/admin_book_update.js"></script>
</head>

<body>
  <div id="admin_book_update">
    <form method="post" id="frmUpdate">
      <table>
        <h1>CHỈNH SỬA SÁCH</h1>
        <?php if(isset($_GET['idbook'])) {
          $idbook =$_GET['idbook'];
          $kq=$b->getBookById($_GET['idbook']);
          if($kq!=null){ $d=$kq; ?>
            <tr>
              <td id="label">Tên sách:</td>
              <td id="valuse"><input type="text" id="name_book" value="<?php echo $d['name'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Hình nền:</td>
              <td id="valuse"><input type="text" id="imgbg" value="<?php echo $d['imgbg'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Hình ảnh chi tiết: </td>
              <td id="valuse"><input type="text" id="imgdetail" value="<?php echo $d['imgdetail'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Tên tác giả:</td>
              <td id="valuse"><input type="text" id="author" value="<?php echo $d['idauthor'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Ngày xuất bản:</td>
              <td id="valuse"><input type="date" id="ngayxbdate" value="echo <?php date('Y-m-d',strtotime($d['ngayxb'])) ?>"/></td>
            </tr>
            <tr>
              <td id="label">Nhà xuất bản:</td>
              <td id="valuse"><input type="text" id="nhaxb" value="<?php echo $d['nhaxb'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Nhà phát hành:</td>
              <td id="valuse"><input type="text" id="nhaph" value="<?php echo $d['nhaph'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Dạng bìa:</td>
              <td id="valuse"><input type="text" id="dangbia" value="<?php echo $d['dangbia'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Kích thước:</td>
              <td id="valuse"><input type="number" id="size" value="<?php echo $d['size'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Khối lượng:</td>
              <td id="valuse"><input type="number" id="weight" value="<?php echo $d['weight'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Số trang:</td>
              <td id="valuse"><input type="number" id="totalpages" value="<?php echo $d['totalpages'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Khuyến mãi:</td>
              <td id="valuse"><input type="number" id="saleoff" value="<?php echo $d['saleoff'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Giá:</td>
              <td id="valuse"><input type="number" id="price" value="<?php echo $d['price'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Tóm tắt:</td>
              <td id="valuse"><input type="text" id="info" value="<?php echo $d['info'] ?>"/></td>
            </tr>
            <tr>
              <td id="label">Thể loại:</td>
              <td id="valuse">
                <select id="type">
                  <?php
                  $idtype=$d['idtype'];
                  $dtype=$type->getNameType($idtype);
                  if($dtype!=null){
                    ?>
                    <option value="<?php echo $idtype; ?>"> <?php echo $dtype['name'] ?></option>
                    <?php
                  }
                  $kqtype=$type->getListTypeNot($idtype);
                  if($kqtype!=null){ while ($dt=mysql_fetch_array($kqtype)) { ?>
                    <option value="<?php echo $dt['idtype']; ?>"> <?php echo $dt['name']; ?> </option>
                    <?php } } ?>
                  </select>

                </td>
              </tr>
              <tr>
                <td id="label">Mức nổi bậc:</td>
                <td id="valuse"><input type="number" id="heighlights" value="<?php echo $d['highlights'] ?>" /></td>
              </tr>
              <tr>
                <td id="label">Trạng thái:</td>
                <td id="valuse"><input type="text" id="status"  value="<?php echo $d['status'] ?>"/></td>
              </tr>
              <tr>
                <td id="label">Số lượng đã bán:</td>
                <td id="valuse"><input type="number" id="sold" value="<?php echo $d['sold'] ?>"/></td>
              </tr>
              <tr>
                <td id="label">Kiểm tra xóa:</td>
                <td id="valuse"><input type="number" id="checkDelete" value="<?php echo $d['checkDelete'] ?>"/></td>
              </tr>
              <tr>
                <td colspan="2" align="center" id="btn">
                  <button type="submit" name="btn" onclick="update('<?php echo $idbook; ?>');">Lưu</button>
                  <a href="index.php?admin=manage_book">Hủy</a>
                </td>
              </tr>
              <?php } } ?>
            </table>

          </form>


        </div>
      </body>
      </html>
