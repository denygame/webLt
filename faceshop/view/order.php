<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/order.js"></script>
  <link rel="stylesheet" type="text/css" href="css/order.css"/>

  <?php require_once 'controller/ShoppingCart.php'; $sc = new ShoppingCart();
  require_once 'controller/BookController.php'; $bController = new BookController();
  require_once 'controller/OrderController.php'; $o = new OrderController();
  require_once 'others/constants.php';

//khi load lại trang nếu tồn tại session click radio thì unset
  if(isset($_SESSION['ship'])) unset($_SESSION['ship']);
  if(isset($_SESSION['payClick'])) unset($_SESSION['payClick']); ?>
</head>
<body>
  <div id="order">
    <fieldset>
      <legend><h1>Thanh toán đơn hàng</h1></legend>
    </fieldset>
    <div id="order_left">
      <?php if(isset($_SESSION['infoObj'])) {
        $total=0; ?>
        <form id="frmOrder" method="post">
          <p id="c1"></p>
          <p id="p1">1</p><h4>Hình thức vận chuyển</h4>
          <input type="radio" name="ship" value="<?php echo constants::priceShipFast; ?>" id="fastShip" onclick="shipClick(this);"/>
          <label>Chuyển nhanh (1-3 ngày làm việc): <font style="color: #CC6600"><?php echo constants::priceShipFast; ?> vnđ</font> </label><br>
          <input type="radio" name="ship" value="<?php echo constants::priceShipNormal; ?>" id="normalShip" onclick="shipClick(this);"/>
          <label>Chuyển thường (4-7 ngày làm việc): <font style="color: #CC6600"><?php echo constants::priceShipNormal; ?> vnđ</font></label>
          <p id="p1">2</p><h4>Hình thức thanh toán</h4>
          <input type="radio" name="co" id="congNganHang" value="<?php echo constants::ttCongNganHang; ?>" onclick="payClick(this);"/>
          <label>Thẻ tín dụng qua cổng ngân hàng <font style="color: #CC6600">(+<?php echo constants::ttCongNganHang; ?> vnđ)</font></label><br>
          <input type="radio" name="co" id="khongTien" onclick="payClick(this);"/>
          <label>Tự thanh toán bằng chuyển khoản ngân hàng <font style="color: #CC6600">( Miễn phí TT )</font> </label><br>
          <input type="radio" name="co" id="khongTien" onclick="payClick(this);"/>
          <label>Thanh toán khi nhận hàng <font style="color: #CC6600">( Miễn phí TT )</font> </label>
          <p id="p1">3</p><h4>Ghi chú cho đơn hàng</h4>
          <textarea></textarea><br>
          <a href="index.php?id=shoppingcart">Quay lại</a>

          <button type="submit" onclick="orderBill();"> Kiểm tra và gửi đi</button>
        </form>
        <?php } ?>

      </div>
      <div id="order_right">
        <h4>Thông tin đơn hàng</h4>
          <table>
              <tr>
                  <th id="name">Tên sách</th>
                  <th id="price" style="padding-right: 17px">Tổng</th>
              </tr>
          </table>
          <div id="book">
              <table>
                  <?php
                  $list = $sc->show();
                  for($i=0;$i<count($list);$i++){
                      $idbook = $list[$i]['idbook']
                      ?>
                      <tr>
                          <td id="name">
                              <?php $kq_book = $bController->getBookById($idbook);
                              if ($kq_book != null) $dbook = $kq_book;
                              echo $dbook['name']; ?>
                          </td>
                          <td id="price">
                              <?php
                              $price= $dbook['price']*(1-$dbook['saleoff']/100);
                              $total=$total+$price;
                              echo $list[$i]['soluong']." x "; echo number_format($price); ?> đ</td>
                      </tr>

                  <?php }
                  //lưu tổng tiền vào session
                  $_SESSION['total']=$total; ?>
              </table>
          </div>
            <table style="background-color: #96daff">
              <tr>
                <td id="name">Tổng giá trị sách</td>
                <td id="price"><?php echo number_format($o->getTotalPrice()); ?> đ</td>
              </tr>
              <tr>
                <td id="name">Chuyển nhanh (1-3 ngày làm  việc)</td>
                <td id="showFast" class="price"><font style="color: #CC6600">0 VNĐ</font> </td>
              </tr>
              <tr>
                <td id="name">Chuyển thường (4-7 ngày làm  việc)</td>
                <td id="showNormal"  class="price"><font style="color: #CC6600">0 VNĐ</font> </td>
              </tr>
              <tr>
                <td id="name"><b>Số tiền bạn cần thanh toán</b></td>
                <td id="endPrice" class="price"><font style="color: #CC6600"><?php echo number_format($o->getTotalPrice()); ?> VNĐ</font>
                </td>
              </tr>
            </table>
          </div>
        </div>

      </body>
      </html>
