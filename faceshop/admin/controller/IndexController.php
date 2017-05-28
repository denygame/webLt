<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';

class IndexController
{
  function __construct() { }

  public function showMainRight(){
    if (!isset($_GET['admin'])) {
        include 'view/admin_book.php';
    } else {
        $admin = $_GET['admin'];
        switch ($admin) {
            case 'manage_book':
                include 'view/admin_book.php';
                break;
            case 'manage_book_detail':
                include 'view/admin_book_detail.php';
                break;
            case 'manage_book_insert':
                include 'view/admin_book_insert.php';
                break;
            case 'manage_book_update':
                include 'view/admin_book_update.php';
                break;
            case 'manage_account':
                include 'view/admin_account.php';
                break;
            case 'manage_account_insert':
                include 'view/admin_account_insert.php';
                break;
            case 'manage_bill':
                include 'view/admin_bill.php';
                break;
            case 'manage_bill_detail':
                include "view/admin_bill_detail.php";
                break;
            case 'manage_category':
                include 'view/admin_category.php';
                break;
            case 'manage_type':
                include 'view/admin_type.php';
                break;
            case 'manage_delete':
                include 'view/admin_delete.php';
                break;
            default :echo 'không có trang này'; break;
        }
    }
  }
}

?>
