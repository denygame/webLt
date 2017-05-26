<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';

class ShoppingCart
{

  function __construct()
  {
    //session_destroy();
    if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();
  }

  public function add($idbook,$soluong){
    if(isset($_SESSION['cart'])) {
      $max=count($_SESSION['cart']);
      $trung_lap=0;

      for($i=0;$i<$max;$i++){
        if($_SESSION['cart'][$i]['idbook']==$idbook){
          $trung_lap=1;
          $vi_tri_trung_lap=$i;
          break;
        }
      }

      if($trung_lap==0){
        $_SESSION['cart'][$max]['idbook']=$idbook;
        $_SESSION['cart'][$max]['soluong']=$soluong;
      }
      else{
        $_SESSION['cart'][$vi_tri_trung_lap]['soluong']=$_SESSION['cart'][$vi_tri_trung_lap]['soluong']+$soluong;
      }
    }
    else{
      $_SESSION['cart'][0]['idbook']=$idbook;
      $_SESSION['cart'][0]['soluong']=$soluong;
    }
  }

  public function show(){
    $list = array();
    if(isset($_SESSION['cart'])){
      $max=count($_SESSION['cart']);

      for($i=0;$i<$max;$i++){
        $list[$i]['idbook']=$_SESSION['cart'][$i]['idbook'];
        $list[$i]['soluong']=$_SESSION['cart'][$i]['soluong'];
      }
      return $list;
    }
    return null;
  }

  public function getCount(){
    if(isset($_SESSION['cart'])){
      $s=0;
      for($i=0;$i<count($_SESSION['cart']);$i++){
        $s=$s+$_SESSION['cart'][$i]['soluong'];
      }
      return $s;
    }
    return 0;
  }

  public function delete($idbook){
    if(isset($_SESSION['cart'])) {
      for($i=0;$i<$this->getCount();$i++)
      if($_SESSION['cart'][$i]['idbook']==$idbook){
        array_splice($_SESSION['cart'], $i ,1); //xóa trong array tại vị trí nào có độ dài 1
        break;
      }
    }
  }

  public function update($idbook,$soluong){
    if(isset($_SESSION['cart'])) {
      if($soluong==0){
        $this->delete($idbook);
        return;
      }

      $max=count($_SESSION['cart']);
      for($i=0;$i<$max;$i++){
        if($_SESSION['cart'][$i]['idbook']==$idbook){
          $pos=$i;
          break;
        }
      }
      $_SESSION['cart'][$pos]['soluong']=$soluong;
    }
    else{
      $_SESSION['cart'][0]['idbook']=$idbook;
      $_SESSION['cart'][0]['soluong']=$soluong;
    }
  }


}


//ajax file countBookSC.js add book to shoppingcart
if(isset($_GET['addbook'])){
  $sc=new ShoppingCart();
  $sc->add($_GET['addbook'],1);
  echo $sc->getCount();
}

//ajax file deleteSC.js
if(isset($_GET['delbook'])){
  $idbook=$_GET['delbook'];
  $sc=new ShoppingCart();
  $sc->delete($idbook);
  //echo $sc->getCount();
  unset($_GET['idbook']);
}

//ajax for update book in main_book.php
if(isset($_GET['addMainBook'])){
  $sc=new ShoppingCart();
  $idbook=$_GET['addMainBook'];
  $count=$_GET['count'];
  $sc->add($idbook,$count,1);

}
?>
