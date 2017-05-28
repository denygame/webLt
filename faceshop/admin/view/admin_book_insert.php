<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="css/admin_book_insert.css"/>
  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/TypeController.php';
  $type = new TypeController(); ?>
  
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/admin_book_insert.js"></script>
</head>

<body>
  <div id="admin_book_insert">
    <form id="frmInsert" method="post" >
      <table>
        <h1>THÊM SÁCH</h1>
        <tr>
          <td id="label">Tên sách:</td>
          <td id="values"><input type="text" id="name_book"/></td>
        </tr>
        <tr>
          <td id="label">Hình nền:</td>
          <td id="values"><input type="text" id="imgbg"/></td>
        </tr>
        <tr>
          <td id="label">Hình ảnh chi tiết: </td>
          <td id="values"><input type="text" id="imgdetail"/></td>
        </tr>
        <tr>
          <td id="label">Tên tác giả:</td>
          <td id="values"><input type="text" id="author"/></td>
        </tr>
        <tr>
          <td id="label">Ngày xuất bản:</td>
          <td id="values"><input type="date" id="ngayxb"/></td>
        </tr>
        <tr>
          <td id="label">Nhà xuất bản:</td>
          <td id="values"><input type="text" id="nhaxb"/></td>
        </tr>
        <tr>
          <td id="label">Nhà phát hành:</td>
          <td id="values"><input type="text" id="nhaph"/></td>
        </tr>
        <tr>
          <td id="label">Dạng bìa:</td>
          <td id="values"><input type="text" id="dangbia"/></td>
        </tr>
        <tr>
          <td id="label">Kích thước:</td>
          <td id="values"><input type="number" id="size"/></td>
        </tr>
        <tr>
          <td id="label">Khối lượng:</td>
          <td id="values"><input type="number" id="weight"/></td>
        </tr>
        <tr>
          <td id="label">Số trang:</td>
          <td id="values"><input type="number" id="totalpages"/></td>
        </tr>
        <tr>
          <td id="label">Khuyến mãi:</td>
          <td id="values"><input type="number" id="saleoff"/></td>
        </tr>
        <tr>
          <td id="label">Giá:</td>
          <td id="values"><input type="number" id="price"/></td>
        </tr>
        <tr>
          <td id="label">Tóm tắt:</td>
          <td id="values"><input type="text" id="info"/></td>
        </tr>
        <tr>
          <td id="label">Thể loại:</td>

          <td id="values">

            <select id="type">
              <option disabled selected hidden> --Chọn thể loại--</option>
              <?php $kqtype=$type->getListType();
              if($kqtype!=null){ while ($dtype=mysql_fetch_array($kqtype)) { ?>
                <option value="<?php echo $dtype['idtype']; ?>"> <?php echo $dtype['name']; ?> </option>
                <?php } } ?>
              </select>

            </td>
          </tr>
          <tr>
            <td id="label">Mức nổi bậc:</td>
            <td id="values"><input type="number" id="heighlightss"/></td>
          </tr>
          <tr>
            <td id="label">Trạng thái:</td>
            <td id="values"><input type="text" id="status" value="Mới"/></td>
          </tr>
          <tr>
            <td id="label">Số lượng đã bán:</td>
            <td id="values"><input type="number" id="sold" value="0"/></td>
          </tr>
          <tr>
            <td id="label">Kiểm tra xóa:</td>
            <td id="values"><input type="number" id="checkDelete" value="0"/></td>
          </tr>
          <tr>
            <td colspan="2" align="center" id="btn">
              <button type="submit" name="btn" onclick="insert();">Thêm</button>
              <a href="index.php?admin=manage_book">Hủy</a>
            </td>
          </tr>
        </table>

      </form>


    </div>
  </body>
  </html>
