<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link href="css/admin_account.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/admin_account.js"></script>
  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/AccountController.php';
  $acc = new AccountController();
  require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/CityController.php';
  $city = new CityController();
  require_once 'controller/ManagerAccount.php'; $m=new ManagerAccount();?>
</head>
<body>
  <?php
  $list=$m->getInfoPageAccount();
  $start=$list['start'];
  $current_page = $list['current_page'];
  $total_page = $list['total_page'];
  if ($current_page > $total_page) $current_page = $total_page; else if ($current_page < 1) $current_page = 1; ?>

  <div id="manage_account">
    <div id="head_account"></div>
    <div id="h1">
      <h1>QUẢN LÝ TÀI KHOẢN</h1>
      <form id="f1" action="index.php?admin=manage_account_insert" method="post">
        <button type="submit">Thêm</button>
      </form>
      <form id="f2" action="" method="post">
        <input type="text" name="find"/>
        <button>Tìm</button>
      </form>
    </div>
    <form style="margin-top:30px;"action="index.php?admin=manage_account" method="post" id="frmHaveDelete">
      <input type="submit" value="Xóa" name="save" id="save" onclick="clickDelete('<?php echo $current_page; ?>','<?php echo $total_page; ?>');"/>
      <table width="100%">
        <tr id="tt">
          <th id="delete"><input type="checkbox" onclick="toggle(this)" name=""></th>
          <th id="name">Tên đăng nhập</th>
          <th id="email">Email</th>
          <th id="sex">Giới tính</th>
          <th id="tel">SĐT</th>
          <th id="city">Tỉnh/ Thành phố</th>
          <th id="address">Địa chỉ</th>
          <th id="district">Quận Huyện</th>
        </tr>
      </table>
      <div id="main_manage_account">
        <table>
          <?php
          $kq=$acc->getListAcc($start);
          if($kq!=null) { while($d=mysql_fetch_array($kq)) { ?>
            <tr>
              <?php
              if($d['checkDelete']==0){
                echo '<td id="delete"><input type="checkbox" name="delete[]" id="delete" value="'.$d['email'].'"/></td>';
              }
              ?>
              <td id="name"><?php echo $d['name']; ?> </td>
              <td id="email"><?php echo $d['email'] ?></td>
              <td id="sex"><?php echo $d['sex'] ?></td>
              <td id="tel"><?php echo $d['tel'];?></td>
              <?php $idcity = $d['idcity']; $kqcity = $city->getNameByID($idcity); ?>
              <td id="city"><?php echo $kqcity; ?></td>
              <td id="address"><?php echo $d['address'] ?></td>
              <td id="district"><?php echo $d['district'] ?></td>
            </tr>
            <?php } } ?>
          </table>
        </form>

      </div  id="phantrang">
      <center><p><?php $m->pageManagerAccount($current_page,$total_page); ?></p></center>
    </div>

  </body>
  </html>
