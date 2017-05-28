<?php

//file php show endPrice trong view/order.php


require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/OrderController.php';


$o = new OrderController();
if(isset($_SESSION['total'])){
  $ttCongNganHang = 0;
  if(isset($_SESSION['payClick'])) $ttCongNganHang=$_SESSION['payClick'];
  $total=$o->getTotalPrice();
  $priceShip = 0;
  if(isset($_SESSION['ship'])) $priceShip = $_SESSION['ship'];
  $endPrice = $total + $priceShip + $ttCongNganHang;
  echo '<font style="color: #CC6600">'.number_format($endPrice).' VNĐ</font>';
}

?>
