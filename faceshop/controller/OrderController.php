<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/AccountController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/GuestDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BillController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/ShoppingCart.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BillinfoController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/PHPMailer/PHPMailerAutoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BookController.php';





class OrderController
{
  //xóa các session ảnh hưởng tiền trong order.php khi hủy giao tác lưu bill, các trang ngoại trừ order đều phải sử dụng ?
  public function unsetSessionMoney(){
    if(isset($_SESSION['infoObj'])) unset($_SESSION['infoObj']);
    if(isset($_SESSION['ship'])) unset($_SESSION['ship']);
    if(isset($_SESSION['total'])) unset($_SESSION['total']);
    if(isset($_SESSION['payClick'])) unset($_SESSION['payClick']);
  }

  public function getTotalPrice(){
    if(isset($_SESSION['cart'])){
      $totalPrice = 0;
      $sc=new ShoppingCart();
      $list = $sc->show();
      $b=new BookController();
      for($i=0;$i<count($list);$i++){
        $price1Book = 0;
        $book = $b->getBookById($list[$i]['idbook']);
        if($book!=null) $price1Book=$book['price'] * (1 - (($book['saleoff']) / 100));
        $totalPrice = $totalPrice + $price1Book * $list[$i]['soluong'];
      }
      return $totalPrice;
    }
  }

  public function saveObject($name,$email,$tel,$address,$district,$idcity,$sex){
    $info = new GuestDTO($name,$email,$tel,$address,$district,$idcity,$sex);
    $_SESSION['infoObj']=serialize($info);
  }

  //lưu hóa đơn xuống db
  public function orderBill(){
    if(isset($_SESSION['infoObj'])&&isset($_SESSION['cart'])){
      $objectGuest=unserialize($_SESSION['infoObj']);
      $email=$objectGuest->email;
      $name=$objectGuest->name;
      $tel=$objectGuest->tel;
      $address=$objectGuest->address;
      $district=$objectGuest->district;
      $idcity=$objectGuest->idcity;
      $sex=$objectGuest->sex;

      $status="New";

      $ship=$_SESSION['ship'];

      $bill=new BillController();
      $idbill=$bill->insert($email,$name,$sex,$tel,$idcity,$district,$address,$status,$ship);

      //lưu billinfo trong bill
      $sc=new ShoppingCart();
      $billInfo=new BillinfoController();
      for($i=0;$i<$sc->getCount();$i++){
        $billInfo->insert($idbill,$_SESSION['cart'][$i]['idbook'],$_SESSION['cart'][$i]['soluong']);
      }
    }
  }

  public function sendMail($email){
    if(isset($_SESSION['cart'])){
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = constants::email;
      $mail->Password = constants::passEmail;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom(constants::email, constants::name);
      $mail->addReplyTo(constants::email, constants::name);
      $mail->addAddress($email);
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      $mail->isHTML(true);

      //lấy ngày tháng (current_date)
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $date = date('m/d/Y h:i:s a', time());


      // region - Nội dung mail
      $bodyContent = '<h1>Bạn đã đăng ký mua sách của chúng tôi!<br/> Vào lúc: <font style="color:red">'.$date.'</font></h1><br/><br/>';
      $bodyContent .= '<h3>ĐƠN HÀNG GỒM: </h3><br/>';

      $sc=new ShoppingCart();
      $list = $sc->show();
      $b=new BookController();

      for($i=0;$i<count($list);$i++){
        $book = $b->getBookById($list[$i]['idbook']);
        $price1Book = 0;
        if($book!=null) $price1Book=$book['price'] * (1 - (($book['saleoff']) / 100));

        $bodyContent .= "<p> - ".$book['name']." x ".$list[$i]['soluong']." = ".number_format($list[$i]['soluong'] * $price1Book)." VNĐ</p>";
      }

      switch ($_SESSION['ship']) {
        case constants::priceShipFast:
        $bodyContent .= "<br/><h3>Vận chuyển nhanh (1-3 ngày làm việc): ".number_format(constants::priceShipFast)." VNĐ</h3>";
        break;
        case constants::priceShipNormal:
        $bodyContent .= "<br/><h3>Vận chuyển thường (4-7 ngày làm việc): ".number_format(constants::priceShipNormal)." VNĐ</h3>";
        break;
        default:break;
      }

      if(isset($_SESSION['payClick'])) $bodyContent .= "<br/><h3>Thanh toán bằng thẻ tín dụng : + ".number_format(constants::ttCongNganHang)." VNĐ</h3>";

      $bodyContent .= "<br/><br/><h2>TỔNG CỘNG: ".number_format($this->getTotalPrice())." VNĐ</h2>";
      //endRegion - Nội dung mail


      $mail->Subject = 'T2HD - BILL';
      $mail->Body    = $bodyContent;

      if(!$mail->send()) {
        /*echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;*/
        echo 'false';
      } else {
        $this->orderBill();
        echo 'true';
      }
    }
  }
}

if(isset($_GET['emailNotLogin'])){
  $email = $_GET['emailNotLogin'];
  $idcity=$_GET['idcity'];
  $name=$_GET['name'];
  $sex=$_GET['sex'];
  $tel=$_GET['tel'];
  $address=$_GET['address'];
  $district=$_GET['district'];

  $o = new OrderController();
  $o->saveObject($name,$email,$tel,$address,$district,$idcity,$sex);
  //echo unserialize($_SESSION['infoObj'])->tel;

}

if(isset($_GET['emailLogin'])){
  $email = $_GET['emailLogin'];
  $idcity=$_GET['idcity'];
  $name=$_GET['name'];
  $sex=$_GET['sex'];
  $tel=$_GET['tel'];
  $address=$_GET['address'];
  $district=$_GET['district'];

  $o = new OrderController();
  $o->saveObject($name,$email,$tel,$address,$district,$idcity,$sex);
  //echo unserialize($_SESSION['infoObj'])->tel;
}


if(isset($_GET['orderNewBill'])){
  if(isset($_SESSION['infoObj'])){
    $objectGuest=unserialize($_SESSION['infoObj']);
    $email=$objectGuest->email;
    $o=new OrderController();
    $o->sendMail($email);
  }
}



if(isset($_GET['unsetSESSION_Order'])){
  if(isset($_SESSION['infoObj'])) unset($_SESSION['infoObj']);
  if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
  if(isset($_SESSION['ship'])) unset($_SESSION['ship']);
  if(isset($_SESSION['total'])) unset($_SESSION['total']);
  if(isset($_SESSION['payClick'])) unset($_SESSION['payClick']);

  //unset luôn các input radio
  if(isset($_POST['ship'])) unset($_POST['ship']);
  if(isset($_POST['co'])) unset($_POST['co']);
}


// lưu session ship vào khi click radio
if(isset($_GET['priceShip'])){
  $_SESSION['ship']=$_GET['priceShip'];
}

// lưu session thanh toán công ngân hàng vào khi click radio
if(isset($_GET['payClick'])){
  $_SESSION['payClick']=$_GET['payClick'];
}

// xóa session thanh toán công ngân hàng khi click radio khác cổng ngân hàng
if(isset($_GET['unsetPayClick'])){
  if(isset($_SESSION['payClick'])){
    unset($_SESSION['payClick']);
  }
}
?>
