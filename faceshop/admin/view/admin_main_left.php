<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="css/admin_main_left.css"/>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <?php require_once 'controller/MainLeftController.php'; $ml = new MainLeftController(); $ml->colorClick(); ?>
</head>

<body>
  <div id="admin_main_left">
    <div id="manage" class="c1">
      <a href="index.php?admin=manage_book">
        <div id="icon"><img src="../img/logo/icon_type.png" /> </div>
        <div id="name_manage">Quản lý sách</div>
      </a>
    </div>
    <div id="manage" class="c2">
      <a href="index.php?admin=manage_category">
        <div id="icon"><img src="../img/logo/icon_category1.png"/></div>
        <div id="name_manage">Quản lý danh mục</div>
      </a>
    </div>
    <div id="manage" class="c3" >
      <a href="index.php?admin=manage_type">
        <div id="icon"><img src="../img/logo/icon_category1.png"/> </div>
        <div id="name_manage">Quản lý thể loại</div>
      </a>
    </div>
    <div id="manage" class="c4">
      <a href="index.php?admin=manage_account">
        <div id="icon"><img src="../img/logo/icon_account_admin.png"/> </div>
        <div id="name_manage">Quản lý tài khoản</div>
      </a>
    </div>
    <div id="manage" class="c5">
      <a href="index.php?admin=manage_bill">
        <div id="icon"><img src="../img/logo/icon_bill.png"/> </div>
        <div id="name_manage">Quản lý hóa đơn</div>
      </a>
    </div>
    <div id="manage" class="c6" >
      <a href="index.php?admin=manage_delete">
        <div id="icon"><img src="../img/logo/icon_delete.png" alt=""/></div>
        <div id="name_manage">Thùng rác</div>
      </a>
    </div>
    <div id="manage" id="c6">
      <a href="index.php?idlogout=logout">
        <div id="icon"><img src="../img/logo/icon_logout.png"/> </div>
        <div id="name_manage">Đăng xuất</div>
      </a>
    </div>
  </div>

</body>
</html>
