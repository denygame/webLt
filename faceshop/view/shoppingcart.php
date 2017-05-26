<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="css/shoppingcart.css"/>

  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/deleteSC.js"></script>
  <script src="js/countBookSC.js"></script>
  <script src="js/shoppingcart.js"></script>

  <?php require_once 'controller/ShoppingCart.php'; $sc = new ShoppingCart();
  require_once 'controller/BookController.php'; $bController = new BookController();
  require_once 'controller/AccountController.php'; $acc= new AccountController();
  require_once'controller/CityController.php'; $city=new CityController();  ?>

</head>
<body>
  <?php if (isset($_POST['count']) && isset($_GET['idbook'])) {
    $count = $_POST['count'];
    $idbook = $_GET['idbook'];
    $sc->update($idbook, $count);
    unset($_POST['count']);
    unset($_GET['idbook']);
  } ?>


  <div>
    <div id="title"><b>Giỏ hàng</b></div>

    <div id="shopingcart_left">
      <div id="list">
        <table>
          <?php $list = $sc->show();
          if ($list == null) { ?>
            <tr>
              <td>Không có sản phẩm nào trong giỏ hàng</td>
            </tr>
            <?php } else {
              for($i=0;$i<count($list);$i++){
                $idbook = $list[$i]['idbook'] ?>
                <tr>
                  <?php $kq_book = $bController->getBookById($idbook);
                  if ($kq_book != null) $d_book = $kq_book; ?>
                  <td>
                    <div id="hinhsach"><a
                      href="index.php?id=book&idbook=<?php echo $d_book['idbook']; ?>"><img
                      src="img/<?php echo $d_book['imgdetail'] ?>"/></a></div>
                    </td>
                    <td>
                      <div id="tensach"><a
                        href="index.php?id=book&idbook=<?php echo $d_book['idbook']; ?>"><?php echo $d_book['name']; ?></a>
                      </div>
                      <div id="delete" onclick="deleteBook('<?php echo $idbook; ?>');"><img
                        src="img/logo/icon_delete.png"/></div>
                      </td>
                      <td>
                        <div id="giaban"><?php echo number_format($d_book['price'] * (1 - $d_book['saleoff'] / 100)) ?>
                          đ
                        </div>
                        <div id="giabia"><?php echo number_format($d_book['price']) ?> đ</div>
                      </td>

                      <form method="post" action="index.php?id=shoppingcart&idbook=<?php echo $idbook; ?>">
                        <td>
                          <input type="number" min="0" value="<?php echo $list[$i]['soluong']; ?>" id="count"
                          name="count" style="width: 38px; text-align: center"/>
                        </td>


                        <td>
                          <button><img src="img/logo/icon_update.png" width="17px;"/></button>
                        </td>
                      </form>

                    </td>
                    <td>
                      <div style="width: 100px; text-align: center; color: #CC6600; font-size: 20px;">
                        <?php echo number_format(($d_book['price'] * (1 - $d_book['saleoff'] / 100)) * $list[$i]['soluong']); ?>
                        đ
                      </div>
                    </td>
                  </tr>
                  <?php }
                } ?>
              </table>
            </div>

            <div id="total">
              <table>
                <tr>
                  <td></td>
                  <td></td>
                  <td><b>Tổng cộng:</b></td>
                  <td><?php
                  $total = 0;
                  $list = $sc->show();
                  if ($list != null) {
                    for($i=0;$i<count($list);$i++){
                      $kq_book = $bController->getBookById($list[$i]['idbook'] );
                      if ($kq_book != null) $d_book = $kq_book;
                      $total = $total + $list[$i]['soluong'] * $d_book['price'];
                    }
                  }
                  echo number_format($total); ?>đ
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><b>Chỉ còn:</b></td>
                <td style="color: #CC6600; font-size: 25px;font-style: italic;">
                  <b><?php
                  $total2 = 0;
                  $list = $sc->show();
                  if ($list != null) {
                    for($i=0;$i<count($list);$i++){
                      $kq_book = $bController->getBookById($list[$i]['idbook']);
                      if ($kq_book != null) $d_book = $kq_book;
                      $total2 = $total2 + $list[$i]['soluong'] * $d_book['price'] * (1 - $d_book['saleoff'] / 100);
                    }
                  }
                  echo number_format($total2); ?>đ</b>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><b>Tiết kiệm được:</b></td>
                <td>
                  <?php
                  echo number_format($total - $total2);
                  ?>đ
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  Tổng tiền chưa bao gồm phí vận chuyển
                  xem thông tin phí vận chuyển tại đây.
                </td>
              </tr>
            </table>
          </div>



          <div id="checkout">
            <?php $dem=$sc->getCount();
            if ($dem > 0) {
              if (!isset($_SESSION['email'])) { ?>
                <fieldset>
                  <legend>Thông tin người mua</legend>
                  <div id="login_sc">
                    <p><b>(1) DÙNG TÀI KHOẢN CỦA BẠN TẠI T2HD_BOOKSTORE</b></p>
                    <p>Bạn chưa đăng nhập hệ thống.<br/>
                      Vui lòng đăng nhập để mua sách & hưởng quyền lợi thành viên của website.</p>
                      <form action="index.php?id=shoppingcart" method="post">
                        <label>Email: <font style="color: red">*</font> </label><br/>
                        <input type="text" name="email" placeholder="example@gmail.com"/><br/>
                        <label>Mật khẩu: <font style="color: red">*</font> </label><br/>
                        <input type="password" name="password" autocomplete="off"/><br/>
                        <center>
                          <button type="submit" name="btn_submit">Đăng nhập</button>
                        </center>
                        <br/>
                      </form>
                      <center> <?php $acc->login("index.php?id=shoppingcart",0); ?> </center>

                      <p id="a"><a href="index.php?id=forgot_password">Quên mật khẩu</a>|<a
                        href="index.php?id=register">Đăng ký tài khoản</a></p>
                      </div>
                      <div id="or">HOẶC</div>
                      <div id="info">
                        <p><b>(2) CHỌN MUA KHÔNG CẦN ĐĂNG NHẬP</b></p>
                        <form action="index.php?id=order" method="post" id="frmCheckOutNotLogin">
                          <table>
                            <tr>
                              <td>Họ tên <font style="color: red">*</font></td>
                              <td><input type="text" id="name" autocomplete="off"/></td>
                            </tr>
                            <tr>
                              <td>Địa chỉ email <font style="color: red">*</font></td>
                              <td><input type="text" id="email" autocomplete="off"/></td>
                            </tr>
                            <tr>
                              <td>
                                <label>Giới tính <font color="red">*</font></label>
                              </td>
                              <td>
                                <select name="gioitinh" id="gioitinh">
                                  <option disabled selected hidden>--Lựa chọn giới tính--</option>
                                  <option value="Male">Nam</option>
                                  <option value="Female">Nữ</option>
                                </select>
                              </td>
                            </tr>

                            <tr>
                              <td>Tỉnh/ Thành phố<font style="color: red">*</font></td>
                              <td>
                                <select id="city">
                                  <option disabled selected hidden>--chọn Tỉnh/ Thành phố--</option>
                                  <?php $dcity=$city->getCitys(); while ($d=mysql_fetch_array(($dcity))) { ?>
                                    <option value="<?php echo $d['idcity'] ?>"><?php echo $d['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Quận/ Huyện <font style="color: red">*</font></td>
                                <td><input type="text" id="district" autocomplete="off"/></td>
                              </tr>
                              <tr>
                                <td>Địa chỉ <font style="color: red">*</font></td>
                                <td><input type="text" id="address" autocomplete="off"/></td>
                              </tr>
                              <tr>
                                <td>Số điện thoại <font style="color: red">*</font></td>
                                <td><input type="text" id="tel" autocomplete="off"/></td>
                              </tr>
                            </table>

                          </div>
                        </fieldset>
                        <button type="submit" name="continue" id="continue" onclick="clickContinueNotLogin();">Tiếp tục</button>
                      </form>

                      <?php } else {
                        $email = $_SESSION['email'];
                        $kqemail = $acc->getAccByEmail($email);
                        $demail = mysql_fetch_assoc($kqemail);
                        ?>
                        <div id="info2">
                          <form action="index.php?id=order" method="post" id="frmCheckOutLogin">
                            <fieldset>
                              <legend>Thông tin người mua</legend>
                              <p><b>CHÀO BẠN ĐÃ QUAY TRỞ LẠI, <?php echo $demail['name']; ?> .</b></p>
                              <table>
                                <tr>
                                  <td>Địa chỉ email của bạn: <font style="color: red">*</font></td>
                                  <td class="in"><input type="text" value="<?php echo $email ?>" id="emailLogin" readonly/></td>
                                </tr>
                                <tr>
                                  <td>Tên của bạn: <font style="color: red">*</font></td>
                                  <td class="in"><input type="text" value="<?php echo $demail['name']?>"  id="nameLogin" autocomplete="off"/></td>
                                </tr>

                                <tr>
                                  <td>
                                    <label>Giới tính <font color="red">*</font></label>
                                  </td>
                                  <td>
                                    <select id="gioitinhLogin">
                                      <option disabled selected hidden>--Lựa chọn giới tính--</option>
                                      <option value="Male">Nam</option>
                                      <option value="Female">Nữ</option>
                                    </select>
                                  </td>
                                </tr>

                                <tr>
                                  <td>
                                    <label>Tỉnh/Thành phố <font color="red">*</font></label>
                                  </td>
                                  <td>
                                    <select id="cityLogin">
                                      <option disabled selected hidden>--Chọn tỉnh/thành phố--</option>
                                      <?php $result=$city->getCitys();
                                      while ($d=mysql_fetch_array(($result))) { ?>
                                        <option value="<?php echo $d['idcity'];?>"> <?php echo $d['name'];?> </option>
                                        <?php } ?>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>Quận/ Huyện <font style="color: red">*</font></td>
                                    <td class="in"><input type="text" value="<?php echo $demail['district']?>" id="districtLogin" autocomplete="off"/></td>
                                  </tr>
                                  <tr>
                                    <td>Địa chỉ của bạn <font style="color: red">*</font></td>
                                    <td><input type="text" value="<?php echo $demail['address'] ?>" id="addressLogin" autocomplete="off"/></td>
                                  </tr>
                                  <tr>
                                    <td>Di động: <font style="color: red">*</font></td>
                                    <td class="in"><input type="text" value="<?php echo $demail['tel'] ?>" id="telLogin" autocomplete="off"/></td>
                                  </tr>
                                </table>
                              </fieldset>
                            </div>
                            <button name="continue" type="submit" id="continue" onclick="clickContinueLogin();">Tiếp tục</button>
                          </form>

                          <?php } } ?>
                        </div>
                      </div>

                      <div id="shoppingcart_right">

                      </div>

                    </div>
                  </body>
                  </html>
