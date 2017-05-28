<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';

class MainLeftController
{
  // khi click thì giữ màu
  public function colorClick(){
    echo '<style type="text/css">';
    if(isset($_GET['admin'])) {
      $style=$_GET['admin'];
      switch ($style) {
        case 'manage_book':
        echo '.c1{background-color: #666666;}';
        break;
        case 'manage_category':
        echo '.c2{background-color:  #666666;}';
        break;
        case 'manage_type':
        echo '.c3{background-color:  #666666;}';
        break;
        case 'manage_account':
        echo '.c4{background-color:  #666666;}';
        break;
        case 'manage_bill':
        echo '.c5{background-color:  #666666;}';
        break;
        case 'manage_delete':
        echo '.c6{background-color:  #666666;}';
        break;
        default :echo 'error'; break;
      }
    }
    echo ' </style>';
  }
}

?>
