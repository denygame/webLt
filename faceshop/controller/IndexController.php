<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BookController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';


class IndexController
{
	private $bookController;

	public function __construct(){
		$this->bookController=new BookController();
	}

	public function showHead(){
		include 'view/head.php';
	}

	public function showFoot(){
		include 'view/foot.php';
	}

	public function showMain(){
		if(isset($_GET['search'])) {
			include 'view/main_category.php';
			return;
		}

		if(!isset($_GET['id'])) include 'view/main_home.php';
		else{
			$id=$_GET['id'];
			switch ($id) {
				case 'main': include 'view/main_home.php'; break;
				case 'book': $this->bookController->showMainBook(); break;
				case 'category': $this->showMainCategory(); break;
				case 'login':  include 'view/login.php'; break;
				case 'register': include 'view/register.php'; break;
				case 'forgot_password': include 'view/forgot_password.php'; break;
				case 'shoppingcart':include 'view/shoppingcart.php'; break;
                case'order':include 'view/order.php';break;
				default : echo'<div style="text-align:center; font-size:50px; height:63px;">Không có thông tin về trang này.</div>'; break;
			}
		}
	}

	private function showMainCategory(){
        if(isset($_GET['idtype'])) $idtype=$_GET['idtype'];
        if(isset($_GET['idcategory'])) $idcategory=$_GET['idcategory'];

        if(!isset($idtype)&&!isset($idcategory)){include 'view/main_home.php';return;}
        if(isset($idcategory)&&isset($idtype)){echo 'Không thể thực thi';return;}
        if(isset($idtype)){include 'view/main_category.php'; return;}
        if(isset($idcategory)){include 'view/main_category.php'; return;}

        include 'view/main_home.php'; return;
    }

}
?>