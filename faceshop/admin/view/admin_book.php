<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Untitled Document</title>
  <link href="css/admin_book.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/admin_book.js"></script>

  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/CategoryController.php';
  $cate = new CategoryController();
  require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/AuthorController.php';
  $au = new AuthorController();
  require_once 'controller/ManagerBook.php'; $m=new ManagerBook();?>


</head>

<body>
  <?php
  $list=$m->getInfoPageManageBook();
  $start=$list['start'];
  $current_page = $list['current_page'];
  $total_page = $list['total_page'];
  if ($current_page > $total_page) $current_page = $total_page; else if ($current_page < 1) $current_page = 1; ?>


  <div id="manage_book">
    <div id="head_book"></div>
    <div id="h1">
      <h1>QUẢN LÝ SÁCH</h1>
      <form id="f1" action="index.php?admin=manage_book_insert" method="post">
        <button type="submit">Thêm</button>
      </form>

      <form id="f2" action="" method="post">
        <input type="text" name="find"/>
        <button>Tìm</button>
      </form>
    </div>
    <div id="h2">
      <form action="index.php?admin=manage_book" method="post" id="frmSearchCb">
        <div id="select_category">
          <select id="cbCategory">
            <option value="000">-- Chọn danh mục --</option>
            <?php $kq = $cate->loadCategory();
            if($kq!=null){ while ($d = mysql_fetch_array($kq)) { ?>

              <option <?php if (isset($_GET['idcategory']) && $_GET['idcategory'] == $d['idcategory']) echo 'selected' ; ?> value="<?php echo $d['idcategory']; ?>"> <?php echo $d['name']; ?></option>

              <?php } } else { ?>
                <option value=""> Không có Danh mục nào </option>
                <?php } ?>
              </select>
            </div>
            <div id="select_type">
              <select id="cbType">
                <option disabled selected hidden>-- Chọn thể loại --</option>
                <?php if(isset($_GET['idcategory']))
                $types=$m->getListTypeByIdCate($_GET['idcategory']);
                if($types!=null){ while ($dType = mysql_fetch_array($types)) {  ?>

                  <option <?php if (isset($_GET['idtype']) && $_GET['idtype'] == $dType['idtype']) echo 'selected' ; ?> value="<?php echo $dType['idtype']; ?>"> <?php echo $dType['name']; ?></option>

                  <?php } } else { ?>
                    <option value=""> Không có Thể loại nào </option>
                    <?php } ?>

              </select>
            </div>
            <button onclick="searchByCbBox();"><img src="../img/logo/icon_select.png" width="25px;"/> </button>
          </form>
        </div>


        <form action="index.php?admin=manage_book" style="height:auto;" method="post" id="frmHaveDelete">
          <input type="submit" name="save" value="Xóa" id="save" onclick="clickDelete('<?php echo $current_page; ?>','<?php echo $total_page; ?>');"/>

          <div style="clear:both" id="main_manage_book">
            <table>
              <tr id="tt">
                <th id="delete"><input type="checkbox" id="checkAll" name="checkAll[]" onclick="toggle(this)" /></th>
                <th id="img_book">Hình</th>
                <th id="name_book">Tên sách</th>
                <th id="author">Tác giả</th>
                <th id="price">Giá</th>
              </tr>

              <?php      $kq=$m->getListBook($start); $i=0;
              if($kq!=null) while($d=mysql_fetch_array($kq)){ ?>
                <tr>
                  <td id="delete"><input type="checkbox" name="delete[]" id="delete" value="<?php echo $d['idbook'] ?>"/></td>
                  <td id="img_book"><a href="../admin/index.php?admin=manage_book_detail&idbook=<?php echo $d['idbook']; ?>"><img src="../img/<?php echo $d['imgdetail']; ?>" width="50px;" > </a></td>
                  <td id="name_book"><a href="../admin/index.php?admin=manage_book_detail&idbook=<?php echo $d['idbook']; ?>"><?php echo $d['name'] ?></a></td>
                  <td id="author">
                    <?php $idauthor=$d['idauthor']; echo $au->getNameAuthorById($idauthor)['name']; ?>
                  </td>
                  <td id="price"><?php echo number_format($d['price']);?>đ</td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </form>


          <div id="phantrang">
            <center><p><?php $m->pageManagerBook($current_page,$total_page); ?></p></center>
          </div>
        </div>
      </body>
      </html>
